<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function index(){

        return view('index')->with('title', Setting::first()->site_name)
                                 ->with('categories', Category::take(5)->get())
                                 ->with('first_post',Post::orderBy('created_at', 'desc')->first())
                                 ->with('second_post',Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                                 ->with('third_post',Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                                 ->with('wordpress', Category::find(4))
                                 ->with('laravel_php', Category::find(7))
                                 ->with('settings', Setting::first());

    }

    public function singlePost($slug){


        $post =Post::with('comments')->with('comments.user')
                                             ->where('slug',$slug)->first();

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');



        return view('single')->with('post',$post)
                                  ->with('title', $post->title)
                                  ->with('settings', Setting::first())
                                  ->with('categories', Category::take(5)->get())
                                  ->with('next', Post::find($next_id))
                                  ->with('prev', Post::find($prev_id));
    }

    public function category($id){

        $category = Category::find($id);

        return view('category')->with('category',$category)
                                    ->with('title', $category->name)
                                    ->with('categories', Category::take(5)->get())
                                    ->with('settings', Setting::first());
    }
}
