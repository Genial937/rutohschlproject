<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_marks extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function exams(){
        return $this->belongsTo(Exam_student::class,'exam_student_id','id');
    }

    public function units(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
