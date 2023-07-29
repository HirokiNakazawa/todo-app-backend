<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Todo extends Model
{
    use HasFactory;

    public $timestamps = false;
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
}