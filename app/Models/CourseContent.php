<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'video',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
