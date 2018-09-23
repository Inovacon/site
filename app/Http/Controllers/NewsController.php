<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Generator as Faker;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => News::latest()->paginate(10),
        ]);
    }

    public function show(News $noticia)
    {
        $outrasNoticias = News::latest()
            ->where('id', '<>', $noticia->id)
            ->limit(5)
            ->get();

    	return view('news.show', compact('noticia', 'outrasNoticias'));
    }
}
