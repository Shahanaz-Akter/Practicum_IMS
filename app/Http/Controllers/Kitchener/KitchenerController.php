<?php

namespace App\Http\Controllers\Kitchener;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KitchenerController extends Controller
{
    public function dashboard()
    {
        return view('kitchen_staff.dashboard');
    }
    public function placeOrder()
    {
        return view('kitchen_staff.placeOrder');
    }

    public function  postPlaceOrder(Request $request)
    {
        $ingredients = $request->ingredient;
        $consumption = $request->consumption;
        $unit = $request->unit;
        $array = [];
        for ($i = 0; $i < count($ingredients); $i++) {

            $num1 = (float)\App\Unit::where('id', $unit[$i])->value('in_gram');
            $num2 = (float) $consumption[$i];
            $gram = $num1 * $num2;

            $array[$ingredients[$i]] = $gram;
        }
        $a = json_encode($array);
        $user = session()->get('user');
        \App\Order::create([
            'details' => $a,
            'status' => "pending",
            'kitchener_id' => $user->id,
            'placed_date' => Carbon::now()->format('d-m-Y'),
        ]);
        return redirect('/kitchener/order_history');
    }

    // public function placeOrderRequest(Request $request)
    // {
    // }
    public function orderHistory()
    {
        return view('kitchen_staff.orderHistory');
    }
}
