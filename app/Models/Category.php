<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sub_categories'];

    protected $casts = [
        'sub_categories' => 'array', // Cast to array for easy access
    ];
}
