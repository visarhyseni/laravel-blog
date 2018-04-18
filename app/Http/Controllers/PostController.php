<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\PostRequest;
use App\Tag;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.posts.index')->with('posts', Post::all())
                                             ->with('coomments', Comment::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();

        if ($categories->count() == 0 || $tags->count()==0) {

          Session::flash('info','You must create at least one category and one tag before you can create a post.');

          return redirect()->back();
        }


        return view('admin.posts.create')->with('categories', $categories)
                                              ->with('tags', Tag::all());
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
        $post->user_id = Auth::id();
        $post->save();

        $post->tag()->attach($request->tags);

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
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)
                                            ->with('categories', Category::all())
                                            ->with('tags', Tag::all());
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
        $this->validate($request, [

            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'


        ]);

        $post = Post::find($id);


        if($request->hasFile('featured')){

            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tag()->sync($request->tags);

        Session::flash('success', 'Post Updated!');

        return redirect()->route('posts');
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


        Session::flash('success', 'Post Deleted permanently');

        return redirect()->back();


    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id){

        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post Restored');

        return redirect()->back();

    }

}
