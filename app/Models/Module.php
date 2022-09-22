<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [  
        'name'
    ];

    protected function course(){
        return $this->belongsTo(Course::class);
    }

    protected function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
