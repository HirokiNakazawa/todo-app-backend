<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'todo',
        'limit_date',
        'is_completed',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getTodosByUser($id)
    {
        $todos = self::join('categories', 'todos.category_id', '=', 'categories.id')
            ->where('todos.user_id', $id)
            ->select('todos.id', 'todos.category_id', 'todos.todo', 'todos.limit_date', 'is_completed', 'categories.category')
            ->orderBy('todos.updated_at', 'desc')
            ->get();
        return $todos;
    }

    public static function createTodo($data)
    {
        $todo = self::create($data->all());
        return self::join('categories', 'todos.category_id', '=', 'categories.id')
            ->where('todos.id', $todo->id)
            ->select('categories.category', 'todos.todo', 'todos.limit_date')
            ->first();
    }

    public static function updateTodo($data, $id)
    {
        $todo = self::findOrFail($id);
        $todo->update($data->all());
        return self::join('categories', 'todos.category_id', '=', 'categories.id')
            ->where('todos.id', $todo->id)
            ->select('categories.category', 'todos.todo', 'todos.limit_date', 'todos.is_completed')
            ->first();
    }
}