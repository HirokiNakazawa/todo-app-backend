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
        $user = AppUser::where('name', $request->name)
            ->where('password', $request->password)
            ->select('id', 'name')->first();

        if ($user) {
            return response()->json(
                $user,
                200
            );
        } else {
            return response()->json(
                "Login Error",
                401
            );
        }
    }
}