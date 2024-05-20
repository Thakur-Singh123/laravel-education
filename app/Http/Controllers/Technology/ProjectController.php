<?php

namespace App\Http\Controllers\Technology;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    //Function for get all projects
    public function all_projects(){
    $get_projects_list = Project::get();
        return view('technology.project.all-projects-list', compact('get_projects_list'));
    }
    
    //Function for add project
    public function add_project(){
        return view('technology.project.add-new-project');
    }

    //Function for submit project
    public function submit_project(Request $request){
        //Check project name is requred
        $IsprojectExists = Project::where('project_name', $request->project_name)->exists();
        if($IsprojectExists) {
            return back()->with('unsuccess', 'Project name is already taken. Please try with a new name.');
        }
        
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/technology/projects'), $filename);
        }

        //create project
        $create_project = Project::create([
            'project_name' =>$request->project_name,
            'address' =>$request->address,
            'state' =>$request->state,
            'country' =>$request->country,
            'pin_code' =>$request->pin_code,
            'status' =>$request->status,
            'image' =>$filename,
        ]);

        //Check if project data is create or not
        if($create_project){
            return back()->with('success', 'Project created successfully..');
        } else {
            return back()-with('unsuccess', 'Opps something went wrong..');
        }
    }

    //Function for edit project
    public function edit_project($id){
    $projects = Project::find($id);
        return view('technology.project.edit-project', compact('projects'));    
    }

    //Function for update project
    public function update_project(Request $request, $id){
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            //get project
            $projects = Project::find($id);
            //get image path
            $imagepath = public_path('uploads/technology/projects/' .$projects->image);
            if(file_exists($imagepath) && is_file($imagepath)){
                //delete image folder
                unlink($imagepath);
            }
            
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/technology/projects'), $filename);

            //update project with image
            $update_projects = Project::where('id', $id)->update([
                'project_name' =>$request->project_name,
                'address' =>$request->address,
                'state' =>$request->state,
                'country' =>$request->country,
                'pin_code' =>$request->pin_code,
                'status' =>$request->status,
                'image' =>$filename,
            ]);
            
            //Check if project is update or not
            if($update_projects){
                return back()->with('success', 'Project updated successfully..');
            } else {
                return back()->with('unsucess', 'Opps something went wrong');
            }
        } else {
            //update project without image
            $update_projects = Project::where('id', $id)->update([
                'project_name' =>$request->project_name,
                'address' =>$request->address,
                'state' =>$request->state,
                'country' =>$request->country,
                'pin_code' =>$request->pin_code,
                'status' =>$request->status,
            ]);
            
            //Check if project is update or not
            if($update_projects){
                return back()->with('success', 'Project updated successfully..');
            } else {
                return back()->with('unsucess', 'Opps something went wrong');
            }

        }
    }

    //Function for delete project
    public function delete_project($id){
        //get projects
        $projects = Project::find($id);
        //get image path
        $imagepath = public_path('uploads/technology/projects/' .$projects->image);
        //Check if project delete with image
        if(file_exists($imagepath) && is_file($imagepath)){
            unlink($imagepath);
            $projects->delete();
            return back()->with('success', 'Project deleted successfully..');    
        } else {
            //project delete without image
            $projects->delete();
            return back()->with('success', 'Project deleted successfully');
        }
    }
}
