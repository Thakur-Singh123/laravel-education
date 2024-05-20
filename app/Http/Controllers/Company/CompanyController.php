<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller
{
    //Function For add company
    public function AddCompany(){
        return view('company.add-new-company');
    }

    public function SubmitCompany(Request $request){
        //Check if the email already exists 
        $existingCompany = Company::where('email', $request->input('email'))->first();
    
        if($existingCompany) {
            return back()->with('unsuccess', 'Email already exists. Please use a different email address.');
        }

        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/company/images'), $filename);
        }
    
        //Create company
        $insert_company = Company::create([
            'company_name' => $request->input('company_name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone_no' => $request->input('phone_no'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'pin_code' => $request->input('pin_code'),
            'status' => $request->input('status'),
            'image' => $filename,
        ]);
    
        //Check if company data is created or not
        if($insert_company) {  
            return back()->with('success', 'Company detail created successfully.');
        } else {
            return back()->with('unsuccess', 'Oops, something went wrong. Please try again.');
        }
    }

    //Function For get all companies list
    public function GetAllCompanies(){
        $all_companies_list = Company::get();
           return view('company.all-companies-list', compact('all_companies_list'));
    }

    //Function For edit company
    public function EditCompany($id){
        $companies = Company::find($id);
            return view('company.edit-company', compact('companies'));
    }

    //Function For update company
    public function UpdateCompany(Request $request, $id){
        $filename = "";
        //Check if image is exit or not
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/company/images'), $filename);

        //Update with image    
        $update_company = Company::where('id', $id)->update([
            'company_name' => $request->input('company_name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone_no' => $request->input('phone_no'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'pin_code' => $request->input('pin_code'),
            'status' => $request->input('status'),
            'image' => $filename,
        ]);    
            //Check if company data is updated or not
            if($update_company) {  
                return back()->with('success', 'Company detail updated successfully.');
            } else {
                return back()->with('unsuccess', 'Oops, something went wrong. Please try again.');            
            }
        } else {
            //Update without image
            $update_company = Company::where('id', $id)->update([
                'company_name' => $request->input('company_name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'phone_no' => $request->input('phone_no'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
                'pin_code' => $request->input('pin_code'),
                'status' => $request->input('status'),
            ]);    
            //Check if company data is updated or not
            if($update_company) {  
                return back()->with('success', 'Company detail updated successfully.');
            } else {
                return back()->with('unsuccess', 'Oops, something went wrong. Please try again.');            
            }
        }
    }

    //Function For delete company
    public function DeleteCompany($id){
        $delete_company = Company::where('id', $id)->delete();
        //Check if company data is deleted or not
        if($delete_company) {  
            return back()->with('success', 'Company detail deleted successfully.');
        } else {
            return back()->with('unsuccess', 'Oops, something went wrong. Please try again.');            
        }

    }
        
}
