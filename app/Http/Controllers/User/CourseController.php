<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContent;
use App\Models\Matrial;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {

        $courses = Course::all();
        return view('dashboard.index', compact('courses'));
    }

    public function courseEnroll($courseId)
    {
        $user = auth()->user();

        $course = Course::find($courseId);

        if ($course) {
            // Attach the user to the course
            $user->courses()->attach($courseId);
            $courses = Course::all();
            return view('dashboard.index', compact('courses'));
        }
        // Handle course not found
        return 'course not found';
    }
    public function showCourse(string $courseId)
    {
        $courseContents = Course::with('sections.content')->find($courseId);

        $teacher = User::find($courseContents->user_id);

        // return $courseContents;

        return view('user.allContentCourse', compact('courseContents', 'teacher'));
    }

    public function showVideo($idContent)
    {
        $courseContent = CourseContent::where('id', $idContent)->first();

        $section = Section::find($courseContent->section_id);

        $course = Course::find($section->course_id);

        $relatedCourses = Course::with('sections.content')->find($course->id);

        $teacher = User::find($relatedCourses->user_id);

        return view('user.showCourse', compact('courseContent', 'relatedCourses', 'teacher'));
    }
}
