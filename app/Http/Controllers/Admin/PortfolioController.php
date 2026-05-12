<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\BusinessUnit;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with(['businessUnit', 'service'])->latest()->paginate(15);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $units = BusinessUnit::active()->ordered()->get();
        $services = Service::active()->ordered()->get();
        return view('admin.portfolios.create', compact('units', 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'business_unit_id' => 'nullable|exists:business_units,id',
            'service_id' => 'nullable|exists:services,id',
            'client' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
            'goals' => 'nullable|string',
            'magenta_role' => 'nullable|string',
            'impact' => 'nullable|string',
            'highlights' => 'nullable|string',
            'project_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'audience_count' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:255',
            'cta_link' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|max:30000',
            'hero_image' => 'nullable|image|max:30000',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('portfolios', 'public');
        }

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('portfolios', 'public');
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function edit(Portfolio $portfolio)
    {
        $units = BusinessUnit::active()->ordered()->get();
        $services = Service::active()->ordered()->get();
        return view('admin.portfolios.edit', compact('portfolio', 'units', 'services'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'business_unit_id' => 'nullable|exists:business_units,id',
            'service_id' => 'nullable|exists:services,id',
            'client' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
            'goals' => 'nullable|string',
            'magenta_role' => 'nullable|string',
            'impact' => 'nullable|string',
            'highlights' => 'nullable|string',
            'project_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'audience_count' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:255',
            'cta_link' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|max:30000',
            'hero_image' => 'nullable|image|max:30000',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('featured_image')) {
            if ($portfolio->featured_image) {
                Storage::disk('public')->delete($portfolio->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('portfolios', 'public');
        }

        if ($request->hasFile('hero_image')) {
            if ($portfolio->hero_image) {
                Storage::disk('public')->delete($portfolio->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('portfolios', 'public');
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil diperbarui!');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->featured_image) {
            Storage::disk('public')->delete($portfolio->featured_image);
        }
        if ($portfolio->hero_image) {
            Storage::disk('public')->delete($portfolio->hero_image);
        }
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil dihapus!');
    }
}
