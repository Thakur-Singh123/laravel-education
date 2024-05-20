<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employers extends Model
{
    use HasFactory;
    protected $table = 'employers';
    protected $fillable = ['employee_id','first_name','last_name','email','mobile','address','start_date','end_date','status'];

    public function employee_detail(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
