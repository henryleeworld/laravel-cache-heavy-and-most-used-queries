<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    public function show() 
    {
        $articleCache = Article::cache()->get('latest')->skip(0)->take(5)->get();
        foreach ($articleCache as $article) {
            echo '編號：' . $article->id . '，標題：' . $article->title. '，內容：' . $article->content . PHP_EOL;
        }
    }
}
