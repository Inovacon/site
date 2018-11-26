<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsImageGalleryController extends Controller
{
    public function index(News $noticia)
    {
        return view('dashboard.news.gallery.index', [
            'images' => $noticia->galleryImagesPathMap,
            'noticia' => $noticia
        ]);
    }

    public function store(Request $request, News $noticia)
    {
        $request->validate(['image' => 'required|image|max:1024']);

        $images = $noticia->galleryImagesPathList;
        $images[] = $request->file('image')->store($noticia->getTable(), 'public');

        $noticia->gallery_images = $images;
        $noticia->save();

        return back()->with('flash', 'Imagem adicionada com sucesso.');
    }

    public function destroy(Request $request, News $noticia)
    {
        if ($request->has('path')) {
            $path = $request->path;
            Storage::disk('public')->delete($path);

            $noticia->gallery_images = array_filter($noticia->galleryImagesPathList, function ($p) use ($path) {
                return $p !== $path;
            });
        } else {
            foreach ($noticia->galleryImagesPathList as $path) {
                Storage::disk('public')->delete($path);
            }

            $noticia->gallery_images = [];
        }

        $noticia->save();

        return back()->with('flash', 'Imagem(ns) removida(s) com sucesso.');
    }
}
