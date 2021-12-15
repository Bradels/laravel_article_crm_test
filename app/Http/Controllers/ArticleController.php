<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::all();
        if ($request->is('api/*')) {
            return response()->json($articles->toJson());
        }else{
            return view('articles_index',['articles'=>$articles]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();
        $image = "default.png";
        if(!is_null($request->image)){
            $image      =       time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $image);
        }
        $article = new Article;
        $article->title = $request->title;
        $article->content = base64_encode($request->content);
        if(!is_null($image)){
            $article->image_path = $image;
        }
        $article->save();
        return view('view_article',[
            'title' => $article->title,
            'content' => base64_decode($article->content),
            'image_path' => "/uploads/".$article->image_path]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, Request $request)
    {
        if ($request->is('api/*')) {
            return response()->json(json_encode($article));
        }else{
            return view('view_article',[
                'title' => $article->title,
                'content' => base64_decode($article->content),
                'image_path' => "/uploads/".$article->image_path]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        error_log($article->id);
        return view('article',['article_id'=>$article->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();
        $image = "default.png";
        if(!is_null($request->image)){
            $image      =       time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $image);
        }
        $article->title = $request->title ?? $article->title;
        $article->content = $request->content ?? $article->title;
        if(!is_null($image)){
            $article->image_path = $image;
        }
        $article->save();
        return view('view_article',[
            'title' => $article->title,
            'content' => base64_decode($article->content),
            'image_path' => "/uploads/".$article->image_path]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
    }
}
