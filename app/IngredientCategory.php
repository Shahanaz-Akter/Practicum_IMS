<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientCategory extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
}
