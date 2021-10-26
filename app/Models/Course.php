<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function schools(){
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function departments(){
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
