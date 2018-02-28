<?php


namespace App\Transformer;

use App\Models\Article;
use League\Fractal\TransformerAbstract;


class ArticleTransformer extends TransformerAbstract
{
    public function transform(Article $article)
    {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'created' => $article->created_at->toIso8601String()
        ];
    }
}
