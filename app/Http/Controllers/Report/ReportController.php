<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function dailyreport(){
        return view('admin.dailyreport');
    }

    public function monthlyreport(){
        return view('admin.monthlyreport');
    }


    public function superadmin_dailyreport(){
        return view('superadmin.dailyreport');
    }

    public function superadmin_monthlyreport(){
        return view('superadmin.monthlyreport');
    }
    
}
