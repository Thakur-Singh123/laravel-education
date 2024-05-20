<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employers;
class EmployersController extends Controller
{
    public function show_employers(){
        return view('admin.employers.add-employers');
    }
    public function submit_employers(Request $request){
        $data = Employers::create([
            'employee_id' => $request->employee_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,            
        ]);
    
       //Check if employers data is inserted or not
       if($data){  
        return back()->with('success','Employers detail created successfully.');
    } else {
        return back()->with('unsuccess','Opps Something wrong. Please try Again.');
    }
    }
    
    
    public function all_employers(){
        $data = Employers::with('employee_detail')->get();
        //echo"<pre>";print_r($data);exit;
            return view('admin.employers.all-employers', compact('data'));
    }
    public  function edit_employers($id){
       //echo "yes";exit;
        $data = Employers::find($id);
        return view('admin.employers.edit-employers', compact('data'));
    }
    public function update_employers(Request $request, $id){
        $update = Employers::where("id", $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
           'address' => $request->address,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,            
            ]);
                return $update;
    } 
    public function delete_employers(Request $request){
       $id = $request->id;
       //echo  $id;exit;
        $data = Employers::find($id)->delete();
        return $data;
        
}
}