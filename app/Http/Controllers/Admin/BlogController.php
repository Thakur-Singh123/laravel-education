<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function show_blog(){
        return view('admin.blog.add-blog');
    }
    public function submit_blog(Request $request){
        echo "<pre>"; print_r($request->all());
        /*$image = time() . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path("images"), $image);
        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $image,
        ]);
       if($blog){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record created succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record created failed!'
            ];
            return $response;
        }*/
    } 
    
    public function all_blog(){
        $blog = Blog::get();
        return view('admin.blog.all-blog', compact('blog'));
    }
    public function edit_blog($id){
        $blog = Blog::find($id);
        return view("admin.blog.edit-blog", compact("blog"));
        
    }
    public function update_blog(Request $request, $id)
    {
        $image = time() . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path("images"), $image);
        $update = Blog::where("id", $id)->update([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "image" => $image,
        ]);
        if ($update) {
            return redirect("/all-blog")->with(
                "status",
                "Blog Details Updated Successfully"
            );
        }
    }
    public function delete_blog($id){
        $data = Blog::find($id)->delete();
        if ($data) {
            return redirect("all-blog")->with(
                "status",
                "Blog Deleted Successfully"
            );
        }
}

}
