<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::latest()->get();
    }

    public function store(Request $request)
    {
        //Category::craete($request->all());
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        return response('Created', Response::HTTP_CREATED);
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
