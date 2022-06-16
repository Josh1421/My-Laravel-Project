<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredients extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'ingredient_name', 'checked'];
}
