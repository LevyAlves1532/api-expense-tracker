<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function registerUser(RegisterUserRequest $request)
    {
        $body = $request->only('fullName', 'email', 'password');
        $file = $request->file('profileImageUrl');
        
        $path = Storage::disk('media')->put('', $file);

        $user = User::create([
            'full_name' => $body['fullName'],
            'email' => $body['email'],
            'password' => $body['password'],
        ]);

        $user->addMedia(public_path('media/' . $path))
            ->toMediaCollection();

        if (! $token = Auth::attempt(['email' => $body['email'], 'password' => $body['password']])) {
            return response()->json(['error' => 'Login ou senha estão incorretos!'], 400);
        }

        return $this->respondWithToken($token);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Login ou senha estão incorretos!'], 400);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        $user = Auth::user();
        $user->profile_image_url = $user->getFirstMediaUrl();
        return response()->json($user);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }
}
