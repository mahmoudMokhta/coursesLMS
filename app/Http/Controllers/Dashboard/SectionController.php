<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::with('course')->get();
        return view('dashboard.sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Section $section)
    {
        $courses = Course::all();
        return view('dashboard.sections.create',compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required|exists:courses,id',
        ]);

        Section::create($request->all());

        return redirect()->route('section.index')
            ->with('success', 'Section created successfully');
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
    public function edit(Section $section)
    {
        $courses = Course::all();

        return view('dashboard.sections.edit', compact('section','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required|exists:courses,id',
        ]);

        $section->update($request->all());

        return redirect()->route('section.index')
            ->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()->route('section.index')->with('success', 'Section deleted successfully');

    }
}
