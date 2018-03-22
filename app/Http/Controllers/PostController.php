<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Session;

use App\Post;

use App\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        if ($categories->count() == 0) {

          Session::flash('info','You must create at least one category before you can create a post.');

          return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->featured = 'uploads/posts/'.$featured_new_name;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);
        $post->save();

        Session::flash('success', 'Post created :D');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Post moved to trash');

        return redirect()->route('posts');
    }

    public function trashed(){

        $posts = Post::onlyTrashed()->get();


        return view('admin.posts.trashed')->with('posts', $posts);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function kill($id){

        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

//                dd($post);

        Session::flash('success', 'Post Deleted permanently');

        return redirect()->back();


    }
}
