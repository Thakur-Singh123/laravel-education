<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Employee;

class EmployeeController extends Controller
{
    //Function For add employee
    public function add_employee(){
        return view('employee.add-new-employee');
    }

    //Function For submit employee
    public function submit_employee(Request $request){
        //Check if the email already exists
        $IsEmailExists = Employee::where('email', $request->email)->exists();
        if ($IsEmailExists) {
            return back()->with('unsuccess', 'Email is already taken. Please try with a new email.');
        } else {
            //Check if image is exit or not
            $filename = "";
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move(public_path('uploads/employee/images'), $filename);
            }

            //Create employee
            $insert_employee = Employee::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'pin_code' => $request->pin_code,
                'status' => $request->status,
                'image' => $filename,
            ]);

            //Check if employee data is inserted or not
            if ($insert_employee) {
                return back()->with('success', 'Employee detail created successfully.');
            } else {
                return back()->with('unsuccess', 'Oops Something wrong. Please try Again.');
            }
        }  return back()->with('unsuccess', 'Email is already taken. Please try with a new email.');
    }

    //Function For get all employee list
    public function all_employee_list(){
        $all_employees_list = Employee::Orderby('id', 'DESC')->get();
            return view('employee.all-employees-list', compact('all_employees_list'));
    }

    //Function For edit employee
    public function edit_employee($id){
        $employees = Employee::find($id);
            return view('employee.edit-employee', compact('employees'));
    }

    //Function For update employee
    public function update_employee(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/employee/images'), $filename);
        
        //Update employee with image
        $update_employee = Employee::where('id', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pin_code' => $request->pin_code,
            'status' => $request->status,
            'image' => $filename,
        ]);
            //Check if employee data is update or not
            if ($update_employee) {
                return back()->with('success', 'Employee detail Updated successfully.');
            } else {
                return back()->with('unsuccess', 'Oops Something wrong. Please try Again.');
            }
        } else {
            //Update employee without image
            $update_employee = Employee::where('id', $id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'pin_code' => $request->pin_code,
                'status' => $request->status,
            ]);

            //Check if employee data is update or not
            if ($update_employee) {
                return back()->with('success', 'Employee detail Updated successfully.');
            } else {
                return back()->with('unsuccess', 'Oops Something wrong. Please try Again.');

            }
       } 
    }

    //Function For delete employee
    public function delete_employee($id){
        $delete_employee = Employee::where('id', $id)->delete();

        //Check if employee data is delete or not
        if ($delete_employee) {
            return back()->with('success', 'Employee detail Deleted successfully.');
        } else {
            return back()->with('unsuccess', 'Oops Something wrong. Please try Again.');

        }
    }
}

