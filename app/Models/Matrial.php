<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrial extends Model
{
    use HasFactory;

    protected $fillable = [
        'matrialFile',
        'course_content_id',
    ];

    public function course_content()
    {
        return $this->belongsTo(CourseContent::class);
    }
}