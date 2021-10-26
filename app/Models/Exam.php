<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function schools(){
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
    public function years(){
        return $this->belongsTo(Academic_year::class, 'academic_year_id', 'id');
    }
    public function semesters(){
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }
}
