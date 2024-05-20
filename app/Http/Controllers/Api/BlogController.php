<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    //Function for submit blog
    public function submit_blog(Request $request){
    //Chek if title not again same send
    $IsBlogExists = Blog::where('title', $request->title)->exists();
    if($IsBlogExists) {
        $success['status'] = 400;
        $success['message'] = "Please enter different type of title name because this is already used..";
        $success['data'] = [];
        return response()->json($success, 400);    
    }
        //Check if title field is required
        if($request->title){
            //Check if image is exit or not
            $filename = "";
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move(public_path('uploads/images'), $filename);
            }

            //create blog
            $insert_blog = Blog::create([
                'title' =>$request->title,
                'description' =>$request->description,
                'status' =>$request->status,
                'image' =>$filename,
            ]);

                //Check if blog is created or not 
                if($insert_blog){
                    $success['status'] = 200;
                    $success['message'] = "Blog details created successfully";
                    $success['data'] = [$insert_blog];
                    return response()->json($success, 200);
                } else {
                    $success['status'] = 400;
                    $success['message'] = "Oops Something Wrong.";
                    $success['data'] = [];
                    return response()->json($success, 400);
                } 

        } else {
            $success['status'] = 400;
            $success['message'] = "Please first title filled...";
            $success['data'] = [];
            return response()->json($success, 400);
        }
    }

    //Function for Get all blogs list
    public function all_blogs_list(){
    $get_all_blogs = Blog::get();    
        //Check if all blogs list is get or not 
        if($get_all_blogs){
            $success['status'] = 200;
            $success['message'] = "Blog details get successfully";
            $success['data'] = [$get_all_blogs];
            return response()->json($success, 200);
        } else {
            $success['status'] = 400;
            $success['message'] = "Oops Something Wrong.";
            $success['data'] = [];
            return response()->json($success, 400);
        } 
    }
    
    //Function for update 
    public function update_blog(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/images'), $filename);
        }

        //update
        $update = Blog::where('id', $id)->update([
            'title' =>$request->title,
            'description' =>$request->description,
            'status' =>$request->status,
            'image' =>$filename,
        ]);

        //Check if data is update or not 
        if($update){
            $success['status'] = 200;
            $success['message'] = "Blog updated successfully";
            $success['data'] = [$update];
            return response()->json($success, 200);
        } else {
            $success['status'] = 400;
            $success['message'] = "Oops Something Wrong.";
            $success['data'] = [];
            return response()->json($success, 400);
        } 
    }

    //function for delete blog
    public function delete_blog($id){
    $delete_blog = Blog::where('id', $id)->delete();
       //Check if data is delete or not 
       if($delete_blog){
            $success['status'] = 200;
            $success['message'] = "Blog deleted successfully";
            $success['data'] = [$delete_blog];
            return response()->json($success, 200);
        } else {
            $success['status'] = 400;
            $success['message'] = "Oops Something Wrong.";
            $success['data'] = [];
            return response()->json($success, 400);
        }
    }
}
