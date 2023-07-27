<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;

class AppUserController extends Controller
{
    public function index()
    {
        $appUsers = AppUser::all();
        return response()->json($appUsers);
    }

    public function register(Request $request)
    {
        $appUser = AppUser::create($request->all());
        return response()->json(
            $appUser,
            201
        );
    }

    public function login(Request $request)
    {
        $exists = AppUser::where('name', $request->name)
            ->where('password', $request->password)
            ->exists();

        if ($exists) {
            return response()->json(
                "ログイン情報が認証されました",
                200,
            );
        } else {
            return response()->json(
                "ログイン情報が間違っています",
                401
            );
        }
    }
}