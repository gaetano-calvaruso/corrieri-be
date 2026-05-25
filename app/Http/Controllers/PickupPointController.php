<?php

namespace App\Http\Controllers;

use App\Models\PickupPoint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PickupPointController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $request->validate([
            'courier' => 'nullable|in:BRT,DHL,SDA',
            'city'    => 'nullable|string|max:100',
            'search'  => 'nullable|string|max:100',
        ]);

        $query = PickupPoint::where('active', true);

        if ($request->filled('courier')) {
            $query->where('courier', $request->courier);
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                  ->orWhere('address', 'like', "%{$term}%")
                  ->orWhere('city', 'like', "%{$term}%");
            });
        }

        $points = $query->select([
            'id', 'courier', 'name', 'address', 'city',
            'province', 'postal_code', 'lat', 'lon',
            'phone', 'opening_hours',
        ])->orderBy('city')->get();

        return response()->json([
            'data'  => $points,
            'total' => $points->count(),
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $point = PickupPoint::where('active', true)->findOrFail($id);

        return response()->json([
            'data' => $point,
        ]);
    }
}
