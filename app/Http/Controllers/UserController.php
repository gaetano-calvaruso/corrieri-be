<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(): JsonResponse
    {
        return response()->json([
            'data' => Auth::user(),
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $user = Auth::user();

        $data = $request->validate([
            'name'         => 'sometimes|string|max:100',
            'surname'      => 'sometimes|string|max:100',
            'phone'        => 'sometimes|nullable|string|max:20',
            'address'      => 'sometimes|nullable|string|max:255',
            'password'     => 'sometimes|string|min:8|confirmed',
        ]);

        $user->update($data);

        return response()->json([
            'message' => 'Profilo aggiornato con successo.',
            'data'    => $user->fresh(),
        ]);
    }
}
