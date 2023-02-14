<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['details', 'status', 'placed_date', 'kitchener_id'];
}
