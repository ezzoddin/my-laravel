<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Category\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate();
        $parentCategories = Category::where('category_id', null)->get();

        return view('panel.categories.index', compact('categories', 'parentCategories'));
    }


    public function store(CategoryCreateRequest $request)
    {

        Category::create(
            $request->validated()
        );

        session()->flash('status', 'دسته بندی مد نظر به درستی ایجاد شد.');

        return back();
    }


    public function edit(Category $category)
    {
        $parentCategories = Category::where('category_id', null)->get();
        return view('panel.categories.edit', compact('category', 'parentCategories'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id']
        ]);

        $category::update(
            $request->only(['name', 'category_id'])
        );

        session()->flash('status', 'دسته بندی مد نظر به درستی ویرایش شد.');

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('status', 'دسته بندی حذف شد.');

        return back();
    }
}
