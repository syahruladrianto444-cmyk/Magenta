<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::active()->published();

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $news = $query->latest()->paginate(9);

        // Get unique categories
        $categories = News::active()->published()
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        return view('frontend.news.index', compact('news', 'categories'));
    }

    public function show(News $news)
    {
        if (!$news->is_active) {
            abort(404);
        }

        $relatedNews = News::active()
            ->published()
            ->where('id', '!=', $news->id)
            ->when($news->category, function ($q) use ($news) {
                $q->where('category', $news->category);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.news.show', compact('news', 'relatedNews'));
    }
}
