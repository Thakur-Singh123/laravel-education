<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Function for show company dashboard
    public function compay_dashboard(){
        return view('company.company-dashboard');
    }
}
