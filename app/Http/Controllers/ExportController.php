<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\UsersExport;
use App\Exports\StudentsExport;
use App\Exports\EmployeesExport;
use App\Exports\ProductExport;

class ExportController extends Controller
{
    //Function for export users data
    public function exportUsers(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    //Function for export students data
    public function exportStudents(){
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    //Function for export employees data
    public function exportEmployees(){
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    //Function for export product data
    public function product_export(){
        return Excel::download(new ProductExport, 'product.xlsx');
    }
}
