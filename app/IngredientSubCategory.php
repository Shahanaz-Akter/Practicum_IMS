<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientSubCategory extends Model
{
    protected $fillable = [
        'name', 'description','image','ingredient_category_id'
    ];
}
