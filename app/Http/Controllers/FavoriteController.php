<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\PickupPoint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(): JsonResponse
    {
        $favorites = Favorite::where('user_id', Auth::id())
            ->with('pickupPoint:id,courier,name,address,city,province,postal_code,lat,lon,phone,opening_hours')
            ->get()
            ->pluck('pickupPoint');

        return response()->json([
            'data'  => $favorites,
            'total' => $favorites->count(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'pickup_point_id' => 'required|integer|exists:pickup_points,id',
        ]);

        $exists = Favorite::where('user_id', Auth::id())
            ->where('pickup_point_id', $data['pickup_point_id'])
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Questo punto di ritiro è già nei tuoi preferiti.',
            ], 422);
        }

        $point = PickupPoint::findOrFail($data['pickup_point_id']);

        Favorite::create([
            'user_id'         => Auth::id(),
            'pickup_point_id' => $data['pickup_point_id'],
        ]);

        return response()->json([
            'message' => "Il punto \"{$point->name}\" è stato aggiunto ai preferiti.",
        ], 201);
    }

    public function destroy(int $pickupPointId): JsonResponse
    {
        $deleted = Favorite::where('user_id', Auth::id())
            ->where('pickup_point_id', $pickupPointId)
            ->delete();

        if (! $deleted) {
            return response()->json([
                'message' => 'Punto di ritiro non trovato nei preferiti.',
            ], 404);
        }

        return response()->json([
            'message' => 'Punto rimosso dai preferiti.',
        ]);
    }
}
