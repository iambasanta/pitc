<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('title')->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        return view('admin.categories.create',compact('category'));
    }

    public function store(Request $request)
    {
        Category::create($this->validateRequest($request));
        return redirect()->route('categories.index')->with('success','New category added successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($this->validateRequest($request,$category));
        return redirect()->route('categories.index')->with('success','Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        if ($category->id === config('cms.default_category_id')) {
            return redirect()->back()->with('error-message', 'You can not delete default category!');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    protected function validateRequest($request, ?Category $category = null){

        $category ??= new Category();

        return $request->validate([
            'title' =>['required',Rule::unique('categories','title')->ignore($category)],
            'slug' =>['required',Rule::unique('categories','slug')->ignore($category)],
        ]);
    }
}
