<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;

class SliderController extends Controller
{
    //Function for submit teacher
    public function submit_teacher(Request $request){
        //Check student name is require create
        if($request->student_name){
            //create student  
            $insert_student = Student::create([
                'teacher_id' =>$request->teacher_id,
                'student_name' =>$request->student_name,
                'address' =>$request->address,
                'city' =>$request->city,
                'phone' =>$request->phone,
                'status' =>$request->status,
            ]);

                //Check if student is created or not 
                if($insert_student){
                    $success['status'] = 200;
                    $success['message'] = "Students details created successfully";
                    $success['data'] = [$insert_student];
                    return response()->json($success, 200);
                } else {
                    $success['status'] = 400;
                    $success['message'] = "Oops Something Wrong.";
                    $success['data'] = [];
                    return response()->json($success, 400);
                } 
        } else {
            $success['status'] = 400;
            $success['message'] = "Please first student name create its required..";
            $success['data'] = [];
            return response()->json($success, 400);
        } 
    }    

    //Function for get all students list
    public function all_students_list(){
        $get_students = Student::get();
        //Check if student is created or not 
        if($get_students){
            $success['status'] = 200;
            $success['message'] = "All Students list created successfully";
            $success['data'] = [$get_students];
            return response()->json($success, 200);
        } else {
            $success['status'] = 400;
            $success['message'] = "Oops Something Wrong.";
            $success['data'] = [];
            return response()->json($success, 400);
        } 
    }

    //Function for update student
    public function update_student(Request $request, $id){
        //update student
        $update_student = Student::where('id', $id)->update([
            'teacher_id' =>$request->teacher_id,
            'student_name' =>$request->student_name,
            'address' =>$request->address,
            'city' =>$request->city,
            'phone' =>$request->phone,
            'status' =>$request->status,
        ]);    
            //Check if student is updated or not 
            if($update_student){
                $success['status'] = 200;
                $success['message'] = "Students details updated successfully";
                $success['data'] = [$update_student];
                return response()->json($success, 200);
            } else {
                $success['status'] = 400;
                $success['message'] = "Oops Something Wrong.";
                $success['data'] = [];
                return response()->json($success, 400);
            }        
    }

    //Function for delete student
    public function delete_student($id){
        //delete student record
        $delete_student = Student::where('id', $id)->delete();
         //Check if student is deleted or not 
         if($delete_student){
            $success['status'] = 200;
            $success['message'] = "Students details deleted successfully";
            $success['data'] = [$delete_student];
            return response()->json($success, 200);
        } else {
            $success['status'] = 400;
            $success['message'] = "Oops Something Wrong.";
            $success['data'] = [];
            return response()->json($success, 400);
        }        
    }
}
