<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PresentationDeck;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PresentationDeckController extends Controller
{
    public function index()
    {
        $decks = PresentationDeck::ordered()->paginate(15);
        return view('admin.decks.index', compact('decks'));
    }

    public function create()
    {
        return view('admin.decks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'business_unit' => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'thumbnail_image' => 'nullable|image|max:5120',
            'pdf_file' => 'nullable|mimes:pdf|max:51200',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['is_featured'] = $request->boolean('is_featured', false);

        if ($request->hasFile('thumbnail_image')) {
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->storeAs(
                'decks/thumbnails', $validated['slug'] . '.' . $request->file('thumbnail_image')->extension(), 'public'
            );
        }

        if ($request->hasFile('pdf_file')) {
            $validated['pdf_file'] = $request->file('pdf_file')->storeAs(
                'decks/pdfs', $validated['slug'] . '.pdf', 'public'
            );
        }

        PresentationDeck::create($validated);

        return redirect()->route('admin.decks.index')->with('success', 'Presentation Deck berhasil ditambahkan!');
    }

    public function edit(PresentationDeck $deck)
    {
        return view('admin.decks.edit', compact('deck'));
    }

    public function update(Request $request, PresentationDeck $deck)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'business_unit' => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'thumbnail_image' => 'nullable|image|max:5120',
            'pdf_file' => 'nullable|mimes:pdf|max:51200',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('thumbnail_image')) {
            if ($deck->thumbnail_image) {
                Storage::disk('public')->delete($deck->thumbnail_image);
            }
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->storeAs(
                'decks/thumbnails', $validated['slug'] . '.' . $request->file('thumbnail_image')->extension(), 'public'
            );
        }

        if ($request->hasFile('pdf_file')) {
            if ($deck->pdf_file) {
                Storage::disk('public')->delete($deck->pdf_file);
            }
            $validated['pdf_file'] = $request->file('pdf_file')->storeAs(
                'decks/pdfs', $validated['slug'] . '.pdf', 'public'
            );
        }

        $deck->update($validated);

        return redirect()->route('admin.decks.index')->with('success', 'Presentation Deck berhasil diperbarui!');
    }

    public function destroy(PresentationDeck $deck)
    {
        // Delete files
        if ($deck->thumbnail_image) {
            Storage::disk('public')->delete($deck->thumbnail_image);
        }
        if ($deck->pdf_file) {
            Storage::disk('public')->delete($deck->pdf_file);
        }

        $deck->delete();

        return redirect()->route('admin.decks.index')->with('success', 'Presentation Deck berhasil dihapus!');
    }
}
