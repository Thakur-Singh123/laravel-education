<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Teacher;

class StudentController extends Controller
{
    //Function For add student
    public function add_student(){
        $get_teachers = Teacher::get();
        return view('admin.student.add-student', compact('get_teachers'));
    }

    //Function For submit student
    public function submit_student(Request $request){
        //create student
        $insert_student = Student::create([
            'teacher_id' =>$request->teacher_id,
            'student_name' =>$request->student_name,
            'address' =>$request->address,
            'city' =>$request->city,
            'phone' =>$request->phone,
            'status' =>$request->status,
        ]);
        //Check if student data is inserted or not
        if($insert_student){  
            return back()->with('success','Student added successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function For get all students list
    public function all_students_list(){
    $all_student_lists = Student::get();
        return view('admin.student.all-students', compact('all_student_lists'));
    }

    //Function For edit student
    public function edit_student($id){
    $get_teachers = Teacher::get();
    $students = Student::find($id);
        return view('admin.student.edit-student', compact('students','get_teachers'));
    }

    //Function For update student
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

        //Check if student data is updated or not
        if($update_student){  
            return back()->with('success','Student updated successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function For delete student
    public function delete_student($id){
    $delete_student = Student::where('id', $id)->delete();
        //Check if student data is deleted or not
        if($delete_student){  
            return back()->with('success','Student deleted successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }
}

