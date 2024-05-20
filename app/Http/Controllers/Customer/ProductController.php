<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CustomerProduct;

class ProductController extends Controller
{
    //Function for get all all products
    public function all_products(){
    $get_products_lists = CustomerProduct::all();
        return view('customer.products.all-products-list', compact('get_products_lists'));
    }

    //Function for add product
    public function add_product(){
        return view('customer.products.add-new-product');
    }

    //Function for submit product
    public function submit_product(Request $request){
        //Check if the email already exists
        $IsEmailExists = CustomerProduct::where('email', $request->email)->exists();
        if($IsEmailExists) {
            return back()->with('unsuccess', 'Email is already taken. Please try with a new email.');
        }
            //Check if image is exit or not
            $filename = "";
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move(public_path('uploads/customer/products/images'), $filename);
            }

            //create product
            $insert_product = CustomerProduct::create([
                'name' =>$request->name,
                'email' =>$request->email,
                'address' =>$request->address,
                'phone_no' =>$request->phone_no,
                'city' =>$request->city,
                'state' =>$request->state,
                'country' =>$request->country,
                'pin_code' =>$request->pin_code,
                'status' =>$request->status,
                'image' =>$filename,
            ]);

            //Check if product data is created or not
            if($insert_product){  
                return back()->with('success','Product detail created successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
    }

    //Function for edit product
    public function edit_product($id){
    $products = CustomerProduct::find($id);
        return view('customer.products.edit-product', compact('products'));
    }

    //Function for update product
    public function update_product(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            //get products
            $products = CustomerProduct::find($id);
            //get imgae folder
            $imagepath = public_path('uploads/customer/products/images/' .$products->image);
            //delete image folder
            if(file_exists($imagepath) && is_file($imagepath)){
                unlink($imagepath);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/customer/products/images'), $filename);

        //update product with image
        $update_product = CustomerProduct::where('id', $id)->update([
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
            //Check if product data is updated or not
            if($update_product){  
                return back()->with('success','Product detail updated successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }
        } else {
        //update product without image
        $update_product = CustomerProduct::where('id', $id)->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'phone_no' =>$request->phone_no,
            'city' =>$request->city,
            'state' =>$request->state,
            'country' =>$request->country,
            'pin_code' =>$request->pin_code,
            'status' =>$request->status,
        ]);
            //Check if product data is updated or not
            if($update_product){  
                return back()->with('success','Product detail updated successfully.');
            } else {
                return back()->with('unsuccess','Opps Something wrong. Please try Again.');
            }

        }
    }

    //Function for delete product
    public function delete_product($id){
        //get prodcuts
        $products = CustomerProduct::find($id);
        //get image path
        $imagepath = public_path('uploads/customer/products/images/' .$products->image);
            //check if image file exists or not folder
            if(file_exists($imagepath) && is_file($imagepath)) {
            //delete image file folder
            unlink($imagepath);    
            $products->delete();   
            return back()->with('success', 'Prodcuts deleted successfully');
        } else {
            //delete product db
            $products->delete();
            return back()->with('success', 'Prodcuts deleted successfully');
        }
    }
}
