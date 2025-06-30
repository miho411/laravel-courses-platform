<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Course;

class CourseContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'file_path',
        'is_free',
        'order',
    ];

     public function course()
    {
        return $this->belongsTo(Course::class);
    }


}
