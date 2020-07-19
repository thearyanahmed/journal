<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $articles = Article::paginate(20);

        return view('welcome',compact('articles'));
    }

    public function categories()
    {
        $cats = Category::with([
            'articles' => function($articles) {
                $articles->select('articles.id','articles.name','articles.slug','articles.created_at')->orderBy('name');
            }
        ])->orderBy('name','asc')->get();

        return view('categories',compact('cats'));
    }
}
