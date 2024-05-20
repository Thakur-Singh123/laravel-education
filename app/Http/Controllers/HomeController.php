<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Blog;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $user = Auth::user();

        if ($user->user_type == "admin") {
            return redirect('admin-dashboard');
        } elseif ($user->user_type == "customer") {
            return redirect('/customer/customer-dashboard');
        } elseif ($user->user_type == "employee") {
            return redirect('employee/employee-dashboard');
        } elseif ($user->user_type == "company") {
            return redirect('company/company-dashboard');
        } elseif ($user->user_type == "technology") {  
            return redirect('technology/dashboard');  
        } else {
            return view("home");
        }
    }

    public function front_view() {
        $blogs = Blog::get();
        $services = Service::get();
        $data = Testimonial::get();
        return view('index', compact('blogs', 'services', 'data'));
    }
}
