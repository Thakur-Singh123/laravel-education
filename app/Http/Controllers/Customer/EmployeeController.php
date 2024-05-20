<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

use App\Models\Employee;

class EmployeeController extends Controller
{
    //Function for get all employees list
    public function all_employees_list(){
    $get_employees_lists = Employee::Orderby('id', 'DESC')->get();
        return view('customer.employees.all-employees-list', compact('get_employees_lists'));
    }

    //Function for add employee
    public function add_employee(){
        return view('customer.employees.add-new-employee');
    }

    //Function for submit employee
    public function submit_employee(Request $request){

        //Validation all fields
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone_no' => 'required|string|max:15',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pin_code' => 'required|string|max:3',
            'image' => 'nullable|image|max:2048', 
            'status' => 'required|in:active,pending,draft,publish,suspend',
        ]);
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/customer/employees'), $filename);
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
        //Check if data is insert or not
        if($insert_employee){
            return back()->with('success', 'Employee created successfully..');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong..');
        }
    }

    //Function for edit
    public function edit_employee($id){
    $employees = Employee::find($id);
        return view('customer.employees.edit-employee', compact('employees'));
    }
    
    //Function for update
    public function update_employee(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            //get employees 
            $employees = Employee::find($id);
            //get imagepath
            $imagepath = public_path('uploads/customer/employees/' .$employees->image);
            //check if image is exist folder or not
            if(file_exists($imagepath) && is_file($imagepath)){
                //delete image folder
                unlink($imagepath);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/customer/employees'), $filename);
            //update employee with imgae
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
            //Check if employee is update or not
            if($update_employee){
                return back()->with('success', 'Employee updated successfully..');
            } else {
                return back()->with('unsucess', 'Opps something went wrong..');
            }
        } else {
                //update employee with imgae
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
                //Check if employee is update or not
                if($update_employee){
                return back()->with('success', 'Employee updated successfully..');
            } else {
                return back()->with('unsucess', 'Opps something went wrong..');
        
            }
        }
    }
    
    //Function for delete employee
    public function delete_employee($id){
    //get employees
    $employees = Employee::find($id);
    //get imagepath
    $imagepath = public_path('uploads/customer/employees/' .$employees->image);
        //check if image exist folder or not
        if(file_exists($imagepath) && is_file($imagepath)){
            //delete with image
            unlink($imagepath);
            $employees->delete();
            return back()->with('success', 'Employee deleted successfully..');
        } else {
            //delete without image 
            $employees->delete();
            return back()->with('success', 'Employee deleted successfully..');
        }
    }
}

