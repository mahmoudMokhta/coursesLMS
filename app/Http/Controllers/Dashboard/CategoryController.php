<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {

        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }

}
