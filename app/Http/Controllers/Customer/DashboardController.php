<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Function for show customer dashboard
    public function customer_dashboard(){
        return view('customer/customer-dashboard');
    }
}
