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

    public function store(Request $request)
    {
        $appUser = AppUser::create($request->all());
        return response()->json(
            $appUser,
            201
        );
    }
}