<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table ='employees';
    protected $fillable =['first_name','last_name','email','phone_no','city','state','country','pin_code','status','image'];

}
