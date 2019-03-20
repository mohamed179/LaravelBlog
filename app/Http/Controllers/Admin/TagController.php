<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
        
        // saving the new tag to the database
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        // redirect to view the new tag
        return redirect(route('tags.show', $tag->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO: view a specific tag ...
        $tag = Tag::where('id', $id)->first();
        if ($tag) {
            dd($tag);
        } else {
            return redirect(route('tags.index'));
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
        $tag = Tag::where('id', $id)->first();
        if ($tag) {
            return view('admin.tags.edit')->with('tag', $tag);
        } else {
            return redirect(route('tags.index'));
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
        $tag = Tag::where('id', $id)->first();
        if ($tag) {
            // validating the request
            $this->validate($request, [
                "name" => "required",
                "slug" => "required",
            ]);
            
            // update the post in the database
            $tag->name = $request->name;
            $tag->slug = $request->slug;
            $tag->save();

            // redirect to view the post after updating
            return redirect(route('tags.show', $tag->id));
        } else {
            return redirect(route('tags.index'));
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
        // TODO: remove the tag from database ...
    }
}
