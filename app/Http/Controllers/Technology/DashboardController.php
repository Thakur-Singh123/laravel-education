<?php

namespace App\Http\Controllers\Technology;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Function for technology dashboard
    public function dashboard(){
        return view('technology.dashboard');
    }
}
