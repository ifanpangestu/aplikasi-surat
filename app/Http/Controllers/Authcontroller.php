<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function register(Request $request)
    {
        $valid = $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        $password = Hash::make($request->password);
        $regis = User::create([
            'name' => $valid['name'],
            'email' => $valid['email'],
            'password' => $password
        ]);

        if ($regis) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data' => $regis
            ], 201);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'GAGAL!',
                'data' => ''
            ], 404);
        }
    }

    public function login(Request $request)
    {
        $valid = $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        $user = User::where('email', $valid['email'])->first();
        if(Hash::check($valid['password'], $user->password)) {
            $apiToken = base64_encode(str::random(40));
            $user->update([
                'api_Token' => $apiToken
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data' => [
                    'user' => $user,
                    'api_token' => $apiToken
                ]
            ], 201);
        } else {
            return response()->json([
                'success' => False,
                'message' => 'GAGAL',
                'data' => ''
            ], 404);
        }
    }

    //
}
