<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        return view('dashboard.news.index', [
            'noticia' => app(News::class),
            'news' => News::latest()->paginate('20'),
        ]);
    }

    public function show(News $noticia)
    {
        return view('dashboard.news.show', compact('noticia'));
    }

    public function create(News $noticia)
    {
        return view('dashboard.news.create', compact('noticia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image_path' => 'required|image|max:1024',
        ]);

        News::create([
            'title' => $request->title,
            'body' => $request->body,
            'image_path' => $request->file('image_path'),
            'gallery_images' => $request->gallery_images ?: [],
            'leading' => $request->has('leading'),
        ]);

        return redirect()
            ->route('dashboard.news.index')
            ->with('flash', 'Notícia cadastrada com sucesso.');
    }

    public function edit(News $noticia)
    {
        return view('dashboard.news.edit', compact('noticia'));
    }

    public function update(Request $request, News $noticia)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image_path' => 'nullable|image',
        ]);

        $noticia->title = $request->title;
        $noticia->body = $request->body;
        $noticia->leading = $request->has('leading');

        if ($request->hasFile('image_path')) {
            $disk = Storage::disk('public');

            if ($disk->exists($noticia->image_path)) {
                $disk->delete($noticia->image_path);
            }

            $noticia->image_path = $request->file('image_path');
        }

        $noticia->save();

        return redirect()
            ->route('dashboard.news.index')
            ->with('flash', 'Notícia atualizada com sucesso.');
    }

    public function destroy(News $noticia)
    {
        $noticia->delete();

        $disk = Storage::disk('public');
        $disk->delete($noticia->image_path);

        if ($noticia->gallery_images) {
            foreach ($noticia->galleryImagesPathList as $img) {
                $disk->delete($img);
            }
        }

        return back()->with('flash', 'Notícia excluída com sucesso.');
    }
}
