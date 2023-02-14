<?php

namespace App\Http\Controllers\Waste;

use App\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Waste;

class WasteController extends Controller
{
    public function wastes()
    {
        $today = \Carbon\Carbon::now()->format('Y-m-d');

        $stocks = Stock::whereDate('expire_date', "<", $today)->where('remaining', '!=', 0)->get();
        
        for ($i = 0; $i < count($stocks); $i++) {
            Waste::create([
                'ingredient_id'=> $stocks[$i]->ingredient_id,
                'amount' => $stocks[$i]->remaining,
                'expire_date'=>$stocks[$i]->expire_date,
                'batch_no'=>$stocks[$i]->batch_no,
                'cost'=> intval($stocks[$i]->cost_per_unit) * intval($stocks[$i]->remaining),
            ]);
            Stock::where(['id'=>$stocks[$i]->id])->delete();
        };
        return redirect('/waste_blade');
    }
    public function wasteblade()
    {
        
        return view('admin.Waste.wastes');
    }
}
