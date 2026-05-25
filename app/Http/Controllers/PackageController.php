<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PickupPoint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function check(Request $request): JsonResponse
    {
        $data = $request->validate([
            'tracking_code'   => 'required|string',
            'pickup_point_id' => 'required|integer|exists:pickup_points,id',
        ]);

        $package = Package::where('tracking_code', $data['tracking_code'])->first();

        if (! $package) {
            return response()->json([
                'message' => 'Il pacco non esiste. Verifica il codice di tracciamento.',
            ], 404);
        }

        if ($package->status === 'expired') {
            return response()->json([
                'message' => 'Il pacco è scaduto e non può più essere ritirato.',
            ], 422);
        }

        if ($package->status === 'collected') {
            return response()->json([
                'message' => 'Il pacco è già stato ritirato il ' . $package->collected_at->format('d/m/Y alle H:i') . '.',
            ], 422);
        }

        if ($package->pickup_point_id !== (int) $data['pickup_point_id']) {
            $correctPoint = PickupPoint::find($package->pickup_point_id);
            $pointName    = $correctPoint ? "{$correctPoint->name} ({$correctPoint->address}, {$correctPoint->city})" : 'un altro punto';

            return response()->json([
                'message'              => "Il pacco è assegnato a un punto di ritiro diverso: {$pointName}.",
                'correct_pickup_point' => $correctPoint,
            ], 422);
        }

        $package->update([
            'status'       => 'collected',
            'user_id'      => Auth::id(),
            'collected_at' => now(),
        ]);

        return response()->json([
            'message' => 'Pacco ritirato con successo!',
            'data'    => $package->load('pickupPoint'),
        ]);
    }

    public function myPackages(): JsonResponse
    {
        $packages = Package::where('user_id', Auth::id())
            ->where('status', 'collected')
            ->with('pickupPoint:id,courier,name,address,city,province')
            ->orderByDesc('collected_at')
            ->get();

        return response()->json([
            'data'  => $packages,
            'total' => $packages->count(),
        ]);
    }

    // Endpoint di servizio (admin) – protetto da API key
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'recipient_name'    => 'required|string|max:100',
            'recipient_surname' => 'required|string|max:100',
            'pickup_point_id'   => 'required|integer|exists:pickup_points,id',
        ]);

        $trackingCode = $this->generateTrackingCode();

        $package = Package::create([
            'tracking_code'     => $trackingCode,
            'recipient_name'    => $data['recipient_name'],
            'recipient_surname' => $data['recipient_surname'],
            'pickup_point_id'   => $data['pickup_point_id'],
            'status'            => 'pending',
        ]);

        return response()->json([
            'message'       => 'Pacco creato con successo.',
            'data'          => $package->load('pickupPoint'),
            'tracking_code' => $trackingCode,
        ], 201);
    }

    private function generateTrackingCode(): string
    {
        do {
            $code = strtoupper(Str::random(3)) . rand(1000, 9999) . strtoupper(Str::random(3));
        } while (Package::where('tracking_code', $code)->exists());

        return $code;
    }
}
