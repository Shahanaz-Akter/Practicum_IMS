<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name', 'ingredient_category_id','ingredient_subcategory_id','batchwise_stock_management'
    ];
}
