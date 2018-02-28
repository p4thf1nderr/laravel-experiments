<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Transformer\ArticleTransformer;
use App\Http\Requests\ArticleRequest;


class ArticleController extends Controller
{
    public function index()
    {
        return $this->collection(Article::paginate(10), new ArticleTransformer());
    }


    public function show($id)
    {
        return $this->item(Article::findOrFail($id), new ArticleTransformer());
    }


    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());

        $data = $this->item($article, new ArticleTransformer());

        return response()->json($data, 201,[
            'Location' => route('article.show', ['id' => $article->id])
        ]);
    }
}
