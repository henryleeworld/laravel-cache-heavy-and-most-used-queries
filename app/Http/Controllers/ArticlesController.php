<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    public function show() 
    {
        $articleCache = Article::cache()->get('latest')->skip(0)->take(5)->get();
        foreach ($articleCache as $article) {
            echo __('Article ID is :id, the title is :title, and the content is :content', ['id' => $article->id, 'title' => $article->title, 'content' => $article->content]) . PHP_EOL;
        }
    }
}
