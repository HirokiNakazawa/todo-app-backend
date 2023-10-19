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
        $user = AppUser::register($request);

        if ($user) {
            return response()->json(
                $user,
                201
            );
        } else {
            return response()->json(
                array("message" => "ユーザー登録に失敗しました"),
                401
            );
        }
    }

    public function login(Request $request)
    {
        $user = AppUser::login($request);

        if ($user) {
            return response()->json(
                $user,
                200
            );
        } else {
            return response()->json(
                array("message" => "ログインに失敗しました"),
                401
            );
        }
    }
}