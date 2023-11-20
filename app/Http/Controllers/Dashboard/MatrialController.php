<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CourseContent;
use App\Models\Matrial;
use App\Models\User;
use Illuminate\Http\Request;

class MatrialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return '<h1>done</h1>';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCourseContent = CourseContent::all();
        return view('dashboard.matrial.create', compact('allCourseContent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matrial = $request->validate([
            'course_content_id' => '',
            'matrialFile' => 'required',
        ]);

        $path = $request->file('matrialFile')->store('public/matrials');
        $matrial['matrialFile'] = $path;
        $matrial['course_content_id'] = 1;

        Matrial::create($matrial);
        return redirect()->route('matrial.index')->with('success', 'matrial added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matrial = Matrial::findOrFail($id);
        return view('dashboard.matrial.show', compact('matrial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matrial = Matrial::findOrFail($id);
        $allCourseContent = CourseContent::all();
        return view('dashboard.matrial.edit', compact('matrial', 'allCourseContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matrial = Matrial::findOrFail($id);
        $matrial = $request->validate([
            'course_content_id' => '',
            'matrialFile' => 'required',
        ]);
        $path = $request->file('matrialFile')->store('public/matrials');
        $matrial['matrialFile'] = $path;
        $matrial['course_content_id'] = 1;
        Matrial::update($matrial);
        return redirect()->route('matrial.index')->with('success', 'matrial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matrial = Matrial::findOrFail($id);
        $matrial->delete();
        return redirect()->route('matrial.index')->with('success', 'matrial deleted successfully');
    }
}
