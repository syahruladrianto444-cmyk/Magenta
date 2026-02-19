<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\BusinessUnit;

class AboutController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'about')->first();
        $businessUnits = BusinessUnit::active()->ordered()->get();

        return view('frontend.about', compact('page', 'businessUnits'));
    }
}
