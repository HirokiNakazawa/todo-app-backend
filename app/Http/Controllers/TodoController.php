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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = Todo::createTodo($request);

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
    public function show($userId)
    {
        $todos = Todo::getTodosByUser($userId);

        return response()->json(
            $todos,
            200
        );
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
        $todo = Todo::updateTodo($request, $id);

        return response()->json(
            $todo,
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            // 削除対象のアイテムが見つからない場合は404エラーを返す
            return response()->json("TODOが見つかりません", 404);
        } else {
            $todo->delete();
            return response()->json("削除が完了しました", 200);
        }
    }
}