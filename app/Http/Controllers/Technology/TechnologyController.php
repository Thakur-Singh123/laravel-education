<?php

namespace App\Http\Controllers\Technology;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;
use App\Models\Image;


class TechnologyController extends Controller
{
    //Function for get all technologies list
    public function all_technologies_list(){
    $get_all_technologies_list = Technology::get();
        return view('technology.technology.all-technologies-list', compact('get_all_technologies_list'));
    }

    //Function for add technology 
    public function add_technology(){
        return view('technology.technology.add-new-technology');
    }

    //Function for submit techonology
    public function submit_technology(Request $request) {
    //Check if image is exit or not
    if ($request->hasFile('image')) {
        $filenames = [];        
        //Upload and attach images
        foreach ($request->file('image') as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension; 
            $file->move(public_path('uploads/technology/images'), $filename);            
            //store image 
            $filenames[] = $filename;
        }
    }

    //Create the technology 
    $technology = Technology::create([
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'phone_no' => $request->phone_no,
        'city' => $request->city,
        'state' => $request->state,
        'country' => $request->country,
        'pin_code' => $request->pin_code,
        'status' => $request->status,
    ]);

    //If images were uploaded, attach them to the technology
    if (!empty($filenames)) {
        foreach ($filenames as $filename) {
            //Create image 
            $technology->images()->create([
                'filename' => $filename,
                'status' => $request->status,
            ]);
        }
    }
        //Check if technology created or not
        if ($technology) {
            return back()->with('success', 'Technology created successfully.');
        } else {
            return back()->with('unsuccess', 'Oops, something went wrong.');
        }
    }

    //Function for edit technology
    public function edit_technology($id){
    $technologies = Technology::find($id);
        return view('technology.technology.edit-technology', compact('technologies'));
    }
    
    public function update_technology(Request $request, $id) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            //get technology
            $technologies = Technology::find($id);
            //get image folder
            $imagepath = public_path('uploads/technology/images/' .$technologies->image);
            //Check if image is exit or not
            if(file_exists($imagepath) && is_file($imagepath)){
                //delete image folder
                unlink($imagepath);
            }            
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/technology/images'), $filename);

            //Update with image
            $update = Technology::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone_no' => $request->phone_no,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'pin_code' => $request->pin_code,
                'status' => $request->status,
                'image' => $filename,
            ]);
            //Check if technology is update or not
            if($update){
                return back()->with('success', 'Technology detail updated successfully..');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong..');
            }
        } else {
            //update without image
            $update = Technology::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone_no' => $request->phone_no,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'pin_code' => $request->pin_code,
                'status' => $request->status,
            ]);
            //Check if technology is update or not
            if($update){
                return back()->with('success', 'Technology detail updated successfully..');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong..');
            }            
        }
    }

    //Function for delete technology
    public function delete_technology($id){
        //get technology
        $technologies = Technology::find($id);
        //get image path
        $imagepath = public_path('uploads/technology/images/' .$technologies->image);
        if(file_exists($imagepath) && is_file($imagepath)){
            unlink($imagepath);
            $technologies->delete();
            //Check if technology is delete with image
            return back()->with('success', 'Technology details deleted successfully..');
        } else {
            //Check if technology is delete without image
            $technologies->delete();
            return back()->with('unsucess', 'Technology details deleted successfully..');
        }
    }
    
}
