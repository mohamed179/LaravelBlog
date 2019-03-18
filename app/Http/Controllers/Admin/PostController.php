<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: upload post image
        // TODO: set the creator 'ADMIN' of the new post
        
        // validating the request
        $this->validate($request, [
            "title" => "required",
            "subtitle" => "required",
            "slug" => "required",
            "body" => "required",
        ]);
        
        // saving the new post to the database
        $post = new Post();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        if ($request->status) {
            $post->status = true;
        }
        $post->posted_by = 0;
        $post->save();

        // redirect to view the new post
        return redirect(route('posts.show', $post->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO: view a specific post ...
        $post = Post::where('id', $id)->first();
        if ($post) {
            dd($post);
        } else {
            return redirect(route('posts.index'));
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
        $post = Post::where('id', $id)->first();
        if ($post) {
            return view('admin.posts.edit')->with('post', $post);
        } else {
            return redirect(route('posts.index'));
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
        // TODO: upload post image

        $post = Post::where('id', $id)->first();
        if ($post) {
            // validating the request
            $this->validate($request, [
                "title" => "required",
                "subtitle" => "required",
                "slug" => "required",
                "body" => "required",
            ]);
            
            // update the post in the database
            $post->title = $request->title;
            $post->subtitle = $request->subtitle;
            $post->slug = $request->slug;
            $post->body = $request->body;
            if ($request->status) {
                $post->status = true;
            } else {
                $post->status = false;
            }
            $post->save();

            // redirect to view the post after updating
            return redirect(route('posts.show', $post->id));
        } else {
            return redirect(route('posts.index'));
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
        // TODO: remove the post from database ...
    }
}
