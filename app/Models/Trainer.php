<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $table = 'traineries';
    protected $fillable = ['name','email','dob','gender','address','phone_no','city','state','country','pin_code','status','image'];
}
