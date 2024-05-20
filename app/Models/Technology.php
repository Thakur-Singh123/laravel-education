<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    
    protected $table = '_technologies';
    protected $fillable = ['name','email','address','phone_no','city','state','country','pin_code','image','status'];

    public function images() {
        return $this->hasMany(Image::class);
    }
}
