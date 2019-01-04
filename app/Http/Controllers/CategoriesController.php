<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryCreateOrUpdate;

class CategoriesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryCreateOrUpdate $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateOrUpdate $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('manager')->with('message', 'Category created!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryCreateOrUpdate $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryCreateOrUpdate $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('manager')->with('message', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return redirect()
                ->route('manager')
                ->with('message', sprintf('Category %s deleted!', $category->name));
        } catch (\Exception $e) {
            return redirect()
                ->route('manager')
                ->withErrors(['category' => 'Not found']);
        }
    }
}
