<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'category'
    ];

    public static function getCategoriesByUser($id)
    {
        $categories = Category::where('user_id', $id)
            ->select('id', 'category')->get();
        return $categories;
    }
}