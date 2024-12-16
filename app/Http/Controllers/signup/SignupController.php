<?php

namespace App\Http\Controllers\signup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;


class SignupController extends Controller
{
    /*
     * Handle the signup process.
    */
    public function store(Request $request)
    {
        try {


            // バリデーション（必要に応じて）
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'password' => 'required|min:6',
                'email' => 'required|email',
            ]);

            // サインアップの処理（例: ユーザー作成）
            // 仮に User モデルを使用する場合
            $user = \App\Models\User::create([
                'name' =>  $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            return response()->json([
                'message' => 'Signup successful!',
                'user' => $user,
            ], 201);
        } catch (Exception $e) {
            return response() -> json([
                'error' => $e->getMessage(),
                'trace' => $e->getTrace(),

            ], 500);
        }
    }
}
