<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\BusinessUnit;
use App\Models\Service;
use App\Models\PresentationDeck;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::active()->with(['businessUnit', 'service']);

        // Filter by business unit
        if ($request->filled('unit')) {
            $query->whereHas('businessUnit', function ($q) use ($request) {
                $q->where('slug', $request->unit);
            });
        }

        // Filter by service
        if ($request->filled('service')) {
            $query->whereHas('service', function ($q) use ($request) {
                $q->where('slug', $request->service);
            });
        }

        $portfolios = $query->latest()->paginate(12);
        $units = BusinessUnit::active()->ordered()->get();
        $services = Service::active()->ordered()->get();

        // Presentation Decks
        $decks = PresentationDeck::active()->ordered()->get();

        return view('frontend.portfolio.index', compact('portfolios', 'units', 'services', 'decks'));
    }

    public function show(Portfolio $portfolio)
    {
        if (!$portfolio->is_active) {
            abort(404);
        }

        $portfolio->load(['businessUnit', 'service', 'images']);

        $relatedPortfolios = Portfolio::active()
            ->where('id', '!=', $portfolio->id)
            ->where(function ($q) use ($portfolio) {
                $q->where('business_unit_id', $portfolio->business_unit_id)
                    ->orWhere('service_id', $portfolio->service_id);
            })
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.portfolio.show', compact('portfolio', 'relatedPortfolios'));
    }
}
