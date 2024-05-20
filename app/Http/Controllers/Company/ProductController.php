<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    //Function for get all products list
    public function all_products_list(){
    $get_products_lists = Product::all();    
        return view('company.product.all-products', compact('get_products_lists'));
    }

    //Function for add product
    public function add_product(){
        return view('company.product.add-new-product');
    }

    //Function for submit product
    public function submit_product(Request $request){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/company/product/images'), $filename);
        }

        //create prodcut
        $insert_product = Product::create([
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

        //Check if product data is inserted or not
        if($insert_product){  
            return back()->with('success','Product detail created successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function for edit product
    public function edit_product($id){
    $products = Product::find($id);
        return view('company.product.edit-product', compact('products'));
    }

    //Function for update product
    public function update_product(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            //get project
            $products = Product::find($id);
            //get image path
            $imagePath = public_path('uploads/company/product/images/' . $products->image);
                //delete image file
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }  
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/company/product/images'), $filename);
            
            //update product with image
            $update_product = Product::where('id', $id)->update([
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
            $update_product = Product::where('id', $id)->update([
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
        //get product
        $products = Product::find($id);
        //get image path
        $imagePath = public_path('uploads/category-banners/' . $products->image);    
        //Check if image file exists or not folder
        if(file_exists($imagePath) && is_file($imagePath)) {
            //delete image file folder
            unlink($imagePath);    
            $products->delete();   
            return back()->with('success', 'product image deleted successfully.');
        } else {
            //delete product without image
            $products->delete();    
            return back()->with('success', 'product deleted successfully.');
        }
    }
}


