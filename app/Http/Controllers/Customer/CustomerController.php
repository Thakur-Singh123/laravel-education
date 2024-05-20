<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    //Function for add customer 
    public function AddCustomer(){
        return view('customer.add-new-customer');
    }

    //Function For submit customer
    public function SubmitCustomer(Request $request){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/customer/images'), $filename);
        }

        //Create customer
        $insert_customer = Customer::create([
            'name' =>$request->name,
            'address' =>$request->address,
            'phone_no' =>$request->phone_no,
            'city' =>$request->city,
            'state' =>$request->state,
            'country' =>$request->country,
            'pin_code' =>$request->pin_code,
            'status' =>$request->status,
            'image' =>$filename,
        ]);
        
        //Check if customer data is created or not
        if($insert_customer){  
            return back()->with('success','Customer detail created successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }

    }

    //Function For get all customers list
    public function GetAllCustomerList(){
        $all_customers_list = Customer::Orderby('id', 'DESC')->get();
            return view('customer.all-customers-list', compact('all_customers_list'));
    }

    //Function For edit customer
    public function EditCustomer($id){
        $customers = Customer::find($id);
            return view('customer.edit-customer', compact('customers'));
    }

    //Function For update customer
    public function UpdateCustomer(Request $request, $id){        
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/customer/images'), $filename);
        //update customer with image
        $update_customer = Customer::where('id', $id)->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'phone_no' =>$request->phone_no,
            'city' =>$request->city,
            'state' =>$request->state,
            'country' =>$request->country,
            'pin_code' =>$request->pin_code,
            'status' =>$request->status,
            'image' =>$filename,
        ]);
            //Check if customer data is updated or not
            if($update_customer){  
                return back()->with('success','Customer detail updated successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            } 
        } else {
        //update customer without image
        $update_customer = Customer::where('id', $id)->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'phone_no' =>$request->phone_no,
            'city' =>$request->city,
            'state' =>$request->state,
            'country' =>$request->country,
            'pin_code' =>$request->pin_code,
            'status' =>$request->status,
        ]);
            //Check if customer data is updated or not
            if($update_customer){  
                return back()->with('success','Customer detail updated successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');

            }
        }
    }

    //Function For delete customer 
    public function DeleteCustomer($id){
        $delete_customer = Customer::where('id', $id)->delete();
         //Check if customer data is deleted or not
         if($delete_customer){  
            return back()->with('success','Customer detail deleted successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');

        }
    }
}
