<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Function For show employee dashboard
    public function employee_dashboard(){
        return view('employee.employee-dashboard');
    }
}
