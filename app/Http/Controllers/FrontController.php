<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\News;

class FrontController extends Controller
{
    public function index()
    {
        // Format data untuk JavaScript
        $collections = Collection::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->map(function($item) {
                return [
                    'title' => $item->title,
                    'short_desc' => $item->short_desc,
                    'description' => $item->description,
                    'image' => $item->image_path
                        ? asset('storage/' . $item->image_path)
                        : asset('assets/content.JPG'),
                ];
            });

        $news = News::published()
            ->take(6)
            ->get()
            ->map(function($item) {
                return [
                    'id' => $item->id,
                    'category' => $item->category,
                    'title' => $item->title,
                    'short_desc' => $item->short_desc,
                    'content' => $item->content,
                    'image' => $item->image_path
                        ? asset('storage/' . $item->image_path)
                        : asset('assets/content.JPG'),
                    'updated_at' => $item->updated_at
                        ? $item->updated_at->format('d M Y')  // ✅ Add null check
                        : now()->format('d M Y'),  // ✅ Fallback ke hari ini
                    'author' => $item->author ?? 'Admin',  // ✅ Add null check
                ];
            });

        return view('front.index', compact('collections', 'news'));
    }
}