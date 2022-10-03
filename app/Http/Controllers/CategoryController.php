<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        // return view('categories.index', [
        //     'categories' => $categories
        // ]);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active ? true : false
        ];

        Category::create($data);

        return redirect()
            ->route('categories.index')
            ->withMessage('Created Successfully!');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {

        $category = Category::find($id);

        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active ? true : false
        ];

        $category->update($data);

        return redirect()
            ->route('categories.index')
            ->withMessage('Updated Successfully!');
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        // Session::flash('message', 'Deleted Successfully!');

        // return redirect()
        //       ->route('categories.index')
        //       ->with('message', 'Deleted Successfully!');

        return redirect()
            ->route('categories.index')
            ->withMessage('Deleted Successfully!');
    }
}
