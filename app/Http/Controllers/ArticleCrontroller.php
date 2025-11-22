<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;

use Exception;

class ArticleCrontroller extends Controller
{
    public function panel($articles)
    {
        $panel = 'Artigos';
        return view('auth.article.index', compact('articles', 'panel'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate();
        return $this->panel($articles);
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $articles = Article::where('name','like',"%{$search}%")
            ->orderBy('created_at', 'desc')
            ->paginate();
        return $this->panel($articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.article.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        try{
            Article::create($request->all());
            flash()->success('Artigo criado com successo');
            return redirect()->route('articles.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        return view('auth.article.form', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        try{
            $article = Article::find($id);
            $article->update($request->all());
            flash()->success('Artigo editado com successo');
            return redirect()->route('articles.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $article = Article::find($id);
            $article->delete();
            flash()->success('Artigo eliminado com successo');
            return redirect()->route('articles.index');
        }catch(Exception){
            flash()->error('Erro na operação');
            return back();
        }
    }
}
