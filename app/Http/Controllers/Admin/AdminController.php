<?php

namespace App\Http\Controllers\Admin;

use App\Unit;
use App\Stock;
use Carbon\Carbon;
use App\Ingredient;
use App\PurchaseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function neworders()
    {
        return view('admin.neworders');
    }
    public function orderHistory()
    {
        return view('admin.orderHistory');
    }

    public function acceptOrder($id, Request $request)
    {
        // // decrement from stock


        $amounts = $request->amounts;
        $stocks = $request->stocks;
        $ids = $request->ingredient_ids;

        for ($i = 0; $i < count($amounts); $i++) {
            $amountt = intval($amounts[$i]);
            if ($stocks[$i] == 'auto') {
                $asenakinai = Ingredient::where('id', $ids[$i])->first()->batchwise_stock_management;
                if ($asenakinai == 0) {
                    $stockauto = Stock::where('ingredient_id', $ids[$i])->where('remaining', '!=', '0')->get();
                    
                }else{
                    $stockauto = Stock::where('ingredient_id', $ids[$i])->where('remaining', '!=', '0')->whereDate('expire_date', '>=', Carbon::now()->format('Y-m-d'))->get();
                }
               

                foreach ($stockauto as $stock) {

                    $remaining = intval($stock->remaining);
                  

                    if ($remaining >= $amountt) {
                        $remaining = $remaining - $amountt;
                        \App\Stock::where('id', $stock->id)->update([
                            'remaining' => $remaining,
                        ]);
                    } else {
                        $amountt  =   $amountt - $remaining;
                        \App\Stock::where('id', $stock->id)->update([
                            'remaining' => 0,
                        ]);
                    }
                }
            } else {
                $stock = \App\Stock::where('id', $stocks[$i])->first();

                $remaining = intval($stock->remaining);

                if ($remaining >= $amountt) {
                    $remaining = $remaining - $amountt;
                    \App\Stock::where('id', $stocks[$i])->update([
                        'remaining' => $remaining,
                    ]);
                }
            }
        }


         \App\Order::where('id',$id)->update(['status'=>'accepted']);


        
        return redirect('/admin/neworders');
    }
    public function RejectOrder($id)
    {
        \App\Order::where('id', $id)->update(['status' => 'rejected']);
        return redirect('/admin/neworders');
    }
    public function checkStock($id)
    {
        $order = \App\Order::where('id', $id)->first();
        return view('admin.checkAvailibility')->with('order', $order);
    }
    public function placePurchase()
    {

        return view('admin.purchaseRequest');
    }
    public function placePurchasePost(Request $request)
    {


        PurchaseRequest::create([
            'ingredient_id' => $request->ingredient,
            'amount' => $request->amount,
            'unit_id' => $request->unit,
            'entry_date' => Carbon::now()->format('Y-m-d'),
        ]);
        return redirect('/admin/place_purchase');
    }
    public function placePurchaseIngredient($id)
    {

        $ingredient = Ingredient::where('id', $id)->first();

        return view('admin.ingredientPurchaseRequest')->with('ingredient', $ingredient);
        return redirect('/admin/place_purchase');
    }
}
