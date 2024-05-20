<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProduct extends Model
{
    use HasFactory;
    protected $table = 'customer_products';
    protected $fillable = ['name','email','address','phone_no','city','state','country','pin_code','image','status'];
}
