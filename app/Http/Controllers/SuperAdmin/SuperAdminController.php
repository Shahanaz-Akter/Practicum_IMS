<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard(){
        return view('superadmin.dashboard');
    }

    public function neworders()
    {
        return view('superadmin.neworders');
    }
    public function orderHistory()
    {
        return view('superadmin.orderHistory');
    }



    public function wastes()
    {
        return view('superadmin.wastes');
    }
}
