<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating the request
        $this->validate($request, [
            "name" => "required",
            "slug" => "required",
        ]);
        
        // saving the new category to the database
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        // redirect to view the new category
        return redirect(route('categories.show', $category->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO: view a specific category ...
        $category = Category::where('id', $id)->first();
        if ($category) {
            dd($category);
        } else {
            return redirect(route('categories.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            return view('admin.categories.edit')->with('category', $category);
        } else {
            return redirect(route('categories.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            // validating the request
            $this->validate($request, [
                "name" => "required",
                "slug" => "required",
            ]);
            
            // update the post in the database
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->save();

            // redirect to view the post after updating
            return redirect(route('categories.show', $category->id));
        } else {
            return redirect(route('categories.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            if($category->delete()) {
                return redirect(route('categories.index'));
            } else {
                return redirect(route('categories.index'))->withErrors(["Category can not be deleted!"]);
            }
        } else {
            return redirect(route('categories.index'))->withErrors(["Category not found!"]);
        }
    }
}
