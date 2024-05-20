<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function show_service(){
        return view('admin.services.add-service');
    }
    public function add_service(Request $request){
        $image = time() . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path("images"), $image);
        $service = Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'regular_price' => $request->regular_price,
            'status' => $request->status,
            'image' => $image,
        ]);
        if ($service) {
            return redirect("/add-service")->with(
                "status",
                "Add Service Created Successfully"
            );
        }
    }
    public function all_service(){
        $service = Service::get();
        return view('admin.services.all-service', compact('service'));
    }
    public function edit_service($id){
        $service = Service::find($id);
        return view('admin.services.edit-service', compact('service'));
        
    }
    public function update_service(Request $request, $id)
    {
        $image = time() . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path("images"), $image);
        $update = Service::where("id", $id)->update([
            "title" => $request->title,
            "description" => $request->description,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "regular_price" => $request->regular_price,
            "status" => $request->status,
            "image" => $image,
        ]);
        if ($update) {
            return redirect("/all-service")->with(
                "status",
                "Service Details Updated Successfully"
            );
        }
    }
    public function delete_service($id){
        $data = Service::find($id)->delete();
        if ($data) {
            return redirect("all-service")->with(
                "status",
                "Blog Deleted Successfully"
            );
        }
}

}


