<?php

namespace App\Http\Controllers;

use App\Models\Admin\Post;
use App\Models\Admin\Type;
use App\Models\Admin\Technology;
use Illuminate\Http\Request;

use App\Http\Controllers\Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::All();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StorePostRequest $request)
    {
        $form_data = $request->validated();

        $slug = Post::generateSlug($request->titolo);

        $form_data['slug'] = $slug;

        if($request->hasFile('immagine')){
            $path = Storage::disk('public')->put('post_immagini', $request->immagine);
            $form_data['immagine'] = $path;
        }

        $post = Post::create($form_data);

        if($request->has('technologies')){
            $post->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.posts.edit', compact('post', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $form_data = $request->validated();

        $slug = Post::generateSlug($request->titolo);

        $form_data['slug'] = $slug;

        if($request->hasFile('immagine')){

            if( $post->immagine ){
                Storage::delete($post->immagine);
            }

            $path = Storage::disk('public')->put('post_immagini', $request->immagine);
            $form_data['immagine'] = $path;
        }

        $post->update($form_data);

        if($request->has('technologies')){
            $post->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->technologies()->sync([]);

        if($post->immagine){
            Storage::delete($post->immagine);
        }

        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
