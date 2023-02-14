<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = ['ingredient_id','unit_id', 'amount','entry_date'];
}
