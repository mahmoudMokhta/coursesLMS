<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category','user')->get();
        return view('dashboard.course.index', compact('courses'));
    }

    public function create()
    {
        // Show the form to create a new course
        $categories = Category::all();
        $users = User::all();

        return view('dashboard.course.create',compact('categories','users'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'slug' => 'string|unique:courses',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        // Create a new course
        $data = $request->except('image');
        $slug = Str::slug($request->input('name'));
        $slug_count = Course::where('slug',$slug)->count();
        if ($slug_count>0)
        {
            $slug .= time().'-'.$slug;
        }
        $data['slug']=$slug;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('courses', $image, $imageName);

            $data['image'] = $imageName;
        }
        Course::create($data);


        // Redirect to the index page with a success message
        return redirect()->route('course.index')->with('success', 'Course created successfully');
    }

    public function show(Course $course)
    {
        // Show the details of a specific course
        return view('course.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        $users = User::all();
        return view('dashboard.course.edit', compact('course', 'categories', 'users'));
    }

    public function update(Request $request, Course $course)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:courses,slug,' . $course->id,
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('courses', $image, $imageName);
            $data['image'] = $imageName;
        }

        $slug = Str::slug($request->input('name'));
        $slug_count = Course::where('slug',$slug)->count();
        if ($slug_count>0)
        {
            $slug .= time().'-'.$slug;
        }
        $data['slug']=$slug;

        $course->update($data);

        return redirect()->route('course.index')->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        // Delete the course
        $course->delete();

        // Redirect to the index page with a success message
        return redirect()->route('course.index')->with('success', 'Course deleted successfully');
    }
}
