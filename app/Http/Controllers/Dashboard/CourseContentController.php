<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CourseContent;
use App\Models\Section;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseContents = CourseContent::all();
        return view('dashboard.content.index', compact('courseContents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        return view('dashboard.content.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'video' => 'required',
            'section_id' => 'required|exists:sections,id',
        ]);

        CourseContent::create($request->all());

        return redirect()->route('content.index')
            ->with('success', 'Course content created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // You may need to pass sections data if you have a relationship with sections
        $courseContent = CourseContent::findOrFail($id);
        $sections = Section::all();
        return view('dashboard.content.edit', compact('sections', 'courseContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseContent $courseContent)
    {

        $request->validate([
            'name' => 'required',
            'video' => 'required',
            'section_id' => 'required|exists:sections,id',
        ]);
        $courseContent->update($request->all());
        return redirect()->route('content.index');
    }


    public function destroy(CourseContent $courseContent)
    {
        $courseContent->delete();

        return redirect()->route('content.index')
            ->with('success', 'Course content deleted successfully');
    }
}
