<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_student extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function results(){
        return $this->hasMany(Exam_marks::class);
    }

    public function students(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function exams(){
        return $this->belongsTo(Exam::class, 'exam_id','id');
    }


}
