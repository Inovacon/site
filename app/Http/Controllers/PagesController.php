<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $leadingNews = News::latest()
            ->where('leading', true)
            ->limit(4)
            ->get();

        $regularNews = News::latest()
            ->where('leading', false)
            ->limit(4)
            ->get();

        return view('pages.index', compact('leadingNews', 'regularNews'));
    }
}
