<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

use App\Models\Trainer;

class TrainerController extends Controller
{
    //Function for get all traineries
    public function all_traineries(){
    $get_traineries_list = Trainer::get();
        return view('company.traineries.all-traineries-list', compact('get_traineries_list'));
    }

    //Function for add trainer
    public function add_trainer(){
        return view('company.traineries.add-new-trainer');
    }

    //Function for submit trainer
    public function submit_trainer(Request $request){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/company/traineries'), $filename);
        }
        //create trainer
        $insert_trainer = Trainer::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'dob' =>$request->dob,
            'gender' =>$request->gender,
            'address' =>$request->address,
            'phone_no' =>$request->phone_no,
            'city' =>$request->city,
            'state' =>$request->state,
            'country' =>$request->country,
            'pin_code' =>$request->pin_code,
            'status' =>$request->status,
            'image' =>$filename,
        ]);
        //Check if trainer data is created or not
        if($insert_trainer){
        	return back()->with('success','Trainer created successfully.');
	    } else {
		   return back()->with('unsuccess','Opps Something wrong. Please try Again.');
	    }
    }

    //Function for edit trainer
    public function edit_trainer($id){
    $trainers = Trainer::find($id);
        return view('company.traineries.edit-trainer', compact('trainers'));
    }
    
    //Function for update trainer
    public function update_trainer(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            //get trainers
            $trainers = Trainer::find($id);
            //get image path
            $imagepath = public_path('uploads/company/traineries/' .$trainers->image);
            //check image is exist folder or not 
            if(file_exists($imagepath) && is_file($imagepath)){
                //delete image folder
                unlink($imagepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/company/traineries'), $filename);
            //update trainer with image
            $update_trainer = Trainer::where('id', $id)->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'dob' =>$request->dob,
                'gender' =>$request->gender,
                'address' =>$request->address,
                'phone_no' =>$request->phone_no,
                'city' =>$request->city,
                'state' =>$request->state,
                'country' =>$request->country,
                'pin_code' =>$request->pin_code,
                'status' =>$request->status,
                'image' =>$filename,
            ]);
            //Check if trainer data is update or not
            if($update_trainer){
                return back()->with('success','Trainer updated successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        } else {
            //update trainer without image
            $update_trainer = Trainer::where('id', $id)->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'dob' =>$request->dob,
                'gender' =>$request->gender,
                'address' =>$request->address,
                'phone_no' =>$request->phone_no,
                'city' =>$request->city,
                'state' =>$request->state,
                'country' =>$request->country,
                'pin_code' =>$request->pin_code,
                'status' =>$request->status,
            ]);
            //Check if trainer data is update or not
            if($update_trainer){
                return back()->with('success','Trainer updated successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        } 
    }

    //Function for delete trainer
    public function delete_trainer($id){
        //get trainer
        $trainers = Trainer::find($id);
        //get imagepath
        $imagepath = public_path('uploads/company/traineries/' .$trainers->image);
        //check if image exist in folder or not
        if(file_exists($imagepath) && is_file($imagepath)){
            //delete image foler
            unlink($imagepath);
            $trainers->delete();
            return back()->with('success', 'Trainer deleted successfully..');            
        } else {
            return back()->with('success', 'Trainer deleted ghgh successfully..');
        }
    }
}
