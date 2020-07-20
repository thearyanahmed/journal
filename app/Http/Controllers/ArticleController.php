<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index','create','store','edit','update','delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function welcome()
    {
        $articles = Article::published()->orderBy('created_at','desc')->paginate(config('conf.pagination'));

        return view('welcome',compact('articles'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->paginate(config('conf.pagination'));

        $stats = [ 'published' => 0, 'drafts' => 0 ];

        foreach($articles as $article) {
            if($article->status === Article::PUBLISHED) {
                $stats['published']++;
            }
            if($article->status === Article::DRAFT) {
                $stats['drafts']++;
            }
        }

        return view('articles.index',compact('articles','stats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();

        return view('articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:articles,slug',
            'excerpt' => 'required|max:255',
            'body' => 'required|max:60000',
            'status' => 'required|in:1,2',
            'categories' => 'nullable'
        ];


        $this->validate($request,$rules);

        $data = $request->only(array_keys($rules));

        $cats = array_keys($data['categories'] ?? []);
        unset($data['categories']);

        try {

            $article = Article::create($data);

            $article->categories()->attach($cats);

            notify('Article added to the page.');

            return redirect()->back();

        } catch (\Exception $e) {
            notify($e->getMessage());

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function show(string $slug)
    {
        $article = Article::whereSlug($slug);

        if(! auth()->check()) {
            $article = $article->where('status',Article::PUBLISHED);
        }

        $article = $article->first();

        if(! $article) {
            throw new \Exception('Could not find the article that you are looking for.');
        }

        $article->load('categories');

        return \view('articles.view',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return Application|Factory|View
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        $article->load('categories');
        $cats = [];

        foreach ($article->categories as $cat) {
            $cats[] = $cat->id;
        }

        return \view('articles.edit',compact('article','cats','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, Article $article)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:articles,slug,' . $article->id,
            'excerpt' => 'required|max:255',
            'body' => 'required|max:60000',
            'status' => 'required|in:1,2',
            'categories' => 'nullable'
        ];

        $this->validate($request,$rules);

        $data = $request->only(array_keys($rules));

        $cats = array_keys($data['categories'] ?? []);
        unset($data['categories']);

        try {

            $article->update($data);

            if(empty($cats)) {
                $article->categories()->detach();
            } else {
                $article->categories()->sync($cats);
            }

            notify('Article updated.');

            return redirect()->back();

        } catch (\Exception $e) {
            notify($e->getMessage());

            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
