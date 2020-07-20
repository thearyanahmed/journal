<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('home');
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


    public function categories()
    {
        $cats = Category::with([
            'articles' => function($articles) {
                $articles->select('articles.id','articles.name','articles.slug','articles.created_at')->orderBy('name');
            }
        ])->orderBy('name','asc')->get();

        return view('categories',compact('cats'));
    }

    public function upload(Request $request)
    {
        if(! $request->hasFile('file')) {
            throw new \Exception('No file provided.');
        }
        $uploaded = $request->file('file')->store('uploads','public');

        $url = url('/') . '/storage/' . $uploaded;

        return response()->json([
            'link' => $url
        ]);
    }
}
