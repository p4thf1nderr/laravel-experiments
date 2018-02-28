<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';


    public function images()
    {
        return $this->hasMany('Image', 'article_id', 'id');
    }

    public function category()
    {
        return $this->belongsToMany('Category', 'articles_category');
    }
}
