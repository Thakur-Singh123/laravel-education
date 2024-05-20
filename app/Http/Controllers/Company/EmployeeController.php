<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
    //Function for Get all employees list
    public function all_employees_list(){
    $get_employees_lists = Employee::Orderby('id', 'DESC')->get();
        return view('company.employee.all-employees-list', compact('get_employees_lists'));
    }

    //Function for add employee
    public function add_employee(){
        return view('company.employee.add-new-employee');
    }

    //Function for submit employee
    public function submit_employee(Request $request){
    //Check if first name is required
    $isfirst_exist = Employee::where('first_name', $request->first_name)->exists();
    if($isfirst_exist) {
        return back()->with('unsuccess', 'First Name is already taken. Please try with a new name.');
    }
    //check if email is exit or not
    $isemail_exist = Employee::where('email', $request->email)->exists();
    if($isemail_exist){
        return back()->with('unsuccess', 'Email is alreay used. Please try new email');
    }
    //Check if image is exit or not
    $filename = "";
    if($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('uploads/company/employees'), $filename);
    }    
    //create employee
    $insert_employee = Employee::create([
        'first_name' =>$request->first_name,
        'last_name' =>$request->last_name,
        'email' =>$request->email,
        'phone_no' =>$request->phone_no,
        'city' =>$request->city,
        'state' =>$request->state,
        'country' =>$request->country,
        'pin_code' =>$request->pin_code,
        'status' =>$request->status,
        'image' =>$filename,
    ]);
        //Check if employee create or not
        if($insert_employee){
            return back()->with('success', 'Employee created successfully..');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong..');
        }   
    }

    //Function for edit employee
    public function edit_employee($id){
    $employees = Employee::find($id);
        return view('company.employee.edit-employee', compact('employees'));
    }

    //Function for update employee
    public function update_employee(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            //get employees
            $employees = Employee::find($id);
            //get image folder
            $imagepath = public_path('uploads/company/employees/' .$employees->image);
            if(file_exists($imagepath) && is_file($imagepath)){
                unlink($imagepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/company/employees'), $filename);
            //update employee with image  
            $update_employee = Employee::where('id', $id)->update([
                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
                'email' =>$request->email,
                'phone_no' =>$request->phone_no,
                'city' =>$request->city,
                'state' =>$request->state,
                'country' =>$request->country,
                'pin_code' =>$request->pin_code,
                'status' =>$request->status,
                'image' =>$filename,
            ]);    
                //Check if employee is exist or not
                if($update_employee) {
                    return back()->with('success', 'Employee updated successfully..');
                } else {
                    return back()->with('unsuccess', 'Opps something went wrong');
                }
        } else {
            //update employee without image  
            $update_employee = Employee::where('id', $id)->update([
                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
                'email' =>$request->email,
                'phone_no' =>$request->phone_no,
                'city' =>$request->city,
                'state' =>$request->state,
                'country' =>$request->country,
                'pin_code' =>$request->pin_code,
                'status' =>$request->status,
            ]);
                //Check if employee is exist or not
                if($update_employee){
                    return back()->with('success', 'Employee updated successfully..');
                } else {
                    return back()->with('unsuccess', 'Opps something went wrong');
                }
        }
    }
    //Funcction for delete employee
    public function delete_employee($id){
        //get employees
        $employees = Employee::find($id);
        //get image folder
        $imagepath = public_path('uploads/company/employees/' .$employees->image);
        //Check if image delete folrder or not
        if(file_exists($imagepath) && is_file($imagepath)){
            unlink($imagepath);
            $employees->delete();
            return back()->with('success', 'Employee deleted successfully..');
        } else {
            //Check if data delete without image in db
            $employees->delete();
            return back()->with('success', 'Employee deleted successfully..');
        }
    }
}
