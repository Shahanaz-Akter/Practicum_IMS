<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'ingredient_id', 'amount','alert_qty','cost_per_unit','remaining','expire_date','manufacture_date','entry_date','batch_no'
    ];
}
