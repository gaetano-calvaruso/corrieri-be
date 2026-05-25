<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'surname'  => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
        ]);

        $user = User::create($data);

        $token = Auth::login($user);

        return response()->json([
            'message' => 'Registrazione completata con successo.',
            'user'    => $user,
            'token'   => $token,
            'type'    => 'bearer',
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Credenziali non valide.',
            ], 401);
        }

        return response()->json([
            'message' => 'Login effettuato con successo.',
            'user'    => Auth::user(),
            'token'   => $token,
            'type'    => 'bearer',
        ]);
    }

    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json([
            'message' => 'Logout effettuato con successo.',
        ]);
    }

    public function refresh(): JsonResponse
    {
        $token = Auth::refresh();

        return response()->json([
            'token' => $token,
            'type'  => 'bearer',
        ]);
    }

    public function me(): JsonResponse
    {
        return response()->json(Auth::user());
    }
}
