<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentList extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','section_id','student_name','campus','course','section','email','address','birth_date','gender','age','number'];
}
