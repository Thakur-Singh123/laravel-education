<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = ['teacher_name','phone','address','status'];

    public function student_detail(){
        return $this->hasMany(Student::class, 'teacher_id','id');
    }
}
