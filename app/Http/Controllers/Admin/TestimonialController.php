<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function show_testimonial(){
        return view('admin.testimonial.add-testimonial');
    }
    public function submit_testimonial(Request $request){
        echo "<pre>"; print_r($request->all());

        /*$image = time() . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path("images"), $image);
        $data = Testimonial::create([
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'regular_price' => $request->regular_price,
            'status' => $request->status,
            'image' => $image,
        ]);
        if ($data) {
            return redirect("/add-testimonial")->with("status", "Testimonial Details Inserted Successfully");
        } */
    } 

    public function all_testimonial(){
        $data = Testimonial::get();
        return view('admin.testimonial.all-testimonial', compact('data'));
    }
    public function edit_testimonial($id){
        $data = Testimonial::find($id);
        return view("admin.testimonial.edit-testimonial", compact("data"));
    }
    public function update_testimonial(Request $request, $id){
        $image = time() . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path("images"), $image);
        $data = Testimonial::where("id", $id)->update([
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'regular_price' => $request->regular_price,
            'status' => $request->status,
            'image' => $image,
        ]);
        if ($data) {
            return redirect("/all-testimonial")->with("status", "Testimonial Details Updated Successfully");
        }
    }
    public function delete_testimonial($id){
        $data = Testimonial::find($id)->delete();
        if ($data) {
            return redirect("/all-testimonial")->with("status", "Testimonial Details Deleted Successfully");
        }
    }
}

