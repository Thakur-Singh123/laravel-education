<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Teacher;
use App\Models\Student;

class TeacherContactController extends Controller
{
    //Function For add teacher
    public function add_teacher(){
        return view('admin.teacher.add-teacher');
    }

    //Function For submit teacher
    public function submit_teacher(Request $request){
        //create teacher
        $insert_taecher = Teacher::create([
            'teacher_name' =>$request->teacher_name,
            'phone' =>$request->phone,
            'address' =>$request->address,
            'status' =>$request->status,
        ]);
          
        //Check if teacher data is inserted or not
        if($insert_taecher){  
            return back()->with('success','Teacher added successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }

    //Function For get all teachers list
    public function all_teachers_list(){
    $all_teacher_lists = Teacher::with('student_detail')->get()->toarray();
    //echo"<pre>";print_r($all_teacher_lists);exit;
        return view('admin.teacher.all-teachers', compact('all_teacher_lists'));
    }

    //Function For edit teacher
    public function edit_teacher($id){
    $students = Student::get();
    $get_teachers = Teacher::get();
    $teachers = Teacher::find($id);
        return view('admin.teacher.edit-teacher', compact('teachers','get_teachers','students'));
    }

    //Function For update teacher
    public function update_teacher(Request $request, $id){
    //update teacher
    $update_teacher = Teacher::where('id', $id)->update([
        'teacher_name' =>$request->teacher_name,
        'phone' =>$request->phone,
        'address' =>$request->address,
        'status' =>$request->status,
    ]);        
        //Check if teacher data is updated or not
        if($update_teacher){  
            return back()->with('success','Teacher updated successfully.');
        } else {
            return back()->with('unsuccess','Opps Something wrong. Please try Again.');
        }
    }
}