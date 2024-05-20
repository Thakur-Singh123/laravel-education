<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = '_image';
    protected $fillable = ['technology_id','filename','status'];

    public function technology() {
        return $this->belongsTo(Technology::class);
    }
}
