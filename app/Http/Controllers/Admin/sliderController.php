<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;

class sliderController extends Controller
{
    //Function for get all sliders list
    public function all_sliders(){
    $get_slider_lists = Slider::get();
        return view('admin.slider.all-sliders', compact('get_slider_lists'));
    }

    //Function for add slider
    public function add_slider(){
        return view('admin.slider.add-new-slider');
    }
    
    //Function for submit slider
    public function submit_sliders(Request $request){
    //Check if image is exit or not
    $filename = "";
    if($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('uploads/admin/sliders'), $filename);
    }
    
    //create slider
    $insert_slider = Slider::create([
                                    'name' =>$request->name,
                                    'desc' =>$request->desc,
                                    'status' =>$request->status,
                                    'image' => $filename,
    ]);
        //Check if slider data is inserted or not
        if($insert_slider){  
            return back()->with('success','Slider detail created successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function for edit slider
    public function edit_slider($id){
    $sliders = Slider::find($id);
        return view('admin.slider.edit-slider', compact('sliders'));
    }

    //Function for update slider
    public function update_sliders(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            //get slider image
            $sliders = Slider::find($id);
            //get imgae path
            $imagepath = public_path('uploads/admin/sliders/'.$sliders->image);
            //delete image folder
            if(file_exists($imagepath) && is_file($imagepath)) {
                unlink($imagepath);
            }                      
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/admin/sliders'), $filename);
            //update slider with image
            $update_slider = Slider::where('id', $id)->update([
                                                            'name' =>$request->name,
                                                            'desc' =>$request->desc,
                                                            'status' =>$request->status,
                                                            'image' => $filename,
            ]);
                //Check if slider data is updated or not
                if($update_slider){  
                    return back()->with('success','Slider detail updated successfully.');
                } else {
                    return back()->with('unsuccess','Opps Something wrong. Please try Again.');
                }
                
        } else {
            //update slider without image
            $update_slider = Slider::where('id', $id)->update([
                                                            'name' =>$request->name,
                                                            'desc' =>$request->desc,
                                                            'status' =>$request->status,
            ]);
                //Check if slider data is updated or not
                if($update_slider){  
                    return back()->with('success','Slider detail updated successfully.');
                } else {
                    return back()->with('unsuccess','Opps Something wrong. Please try Again.');
                }
            }
    }

    //Function for delete slider
    public function delete_slider($id){
        //get slider
        $delete_slider = Slider::find($id);
        //get image path
        $imagepath = public_path('uploads/admin/sliders/'.$delete_slider->image);
        //delete image folder
        if(file_exists($imagepath) && is_file($imagepath)){
            unlink($imagepath);
            $delete_slider->delete();
            return back()->with('success','Slider deleted successfully.');
        } else {
            //delete data without image
            $delete_slider->delete();
            return back()->with('success','Slider deleted successfully.');
        }
    }
}
