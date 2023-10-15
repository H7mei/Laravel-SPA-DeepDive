<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Models\Categories;
use App\Models\Posts;
use App\Tables\Categories as TablesCategories;
use ProtoneMedia\Splade\Facades\Toast;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => TablesCategories::class
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoriesRequest $request)
    {
        Categories::create($request->validated());

        Toast::success('Category created!');

        return redirect()->route('categories.index');
    }

    public function show(Categories $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Categories $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoriesRequest $request, Categories $category)
    {
        $category->update($request->validated());

        Toast::success('Category updated!');

        return redirect()->route('categories.index');
    }

    public function destroy(Categories $category)
    {
        $count = Posts::where('category_id', $category->id)->count();

        // validate if category has posts
        if ($count > 0) {
            Toast::warning('Cannot delete category there are posts associated with it!!');

            return redirect()->route('categories.index');
        }

        $category->delete();

        Toast::danger('Category deleted!');

        return redirect()->route('categories.index');
    }
}
