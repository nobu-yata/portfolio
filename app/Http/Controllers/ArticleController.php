<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $count = Article::count();
        return view('articles.index', compact('articles', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Article $article, Request $request)
    {
        $article->fill([
            'title' =>  $request->input('title'),
            'body' => $request->input('body')
        ])->save();


        return redirect()->route('articles.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, Request $request)
    {
        $article = Article::find($request->id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Article $article, Request $request)
    {

        $article->where('id', '=', $request->id)
            ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]);

        return redirect()->route('articles.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, Request $request)
    {
        $article->where('id', '=', $request->id)
            ->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Post updated successfully');
    }
}
