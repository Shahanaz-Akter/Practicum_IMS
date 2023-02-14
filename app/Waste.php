<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    protected $fillable = [
       'ingredient_id','amount','cost','expire_date','batch_no'
    ];
}
