<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }
 
    public function show(Article $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return response()->json($article);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return response()->json($article);
    }

    public function delete(Request $request, Article $article)
    {
        $article->delete();
        //204 status code: The server has successfully fulfilled the request and that there is no additional content to send in the response payload body.
        return response()->json(null, 204);
    }
}
