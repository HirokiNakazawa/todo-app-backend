<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json(
            $todo,
            201
        );
    }

    public function getUserTodos($userId)
    {
        $todos = Todo::join('categories', 'todos.category_id', '=', 'categories.id')
            ->where('todos.user_id', $userId)
            ->select('todos.*', 'categories.category as category_name')
            ->orderBy('todos.updated_at', 'desc')
            ->get();
        return response()->json(
            $todos,
            200
        );
    }

    public function showByCategory($categoryId)
    {
        $todos = Todo::where('category_id', $categoryId)->get();
        return response()->json(
            $todos,
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $todo = Todo::findOrFail($id);
        $todo->update($data);
        return response()->json(
            $todo,
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}