<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BusinessUnitController extends Controller
{
    public function index()
    {
        $units = BusinessUnit::ordered()->paginate(15);
        return view('admin.units.index', compact('units'));
    }

    public function create()
    {
        return view('admin.units.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'services_list' => 'nullable|string',
            'instagram' => 'nullable|string|max:100',
            'website' => 'nullable|url|max:255',
            'color' => 'nullable|string|max:20',
            'logo' => 'nullable|image|max:1024',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('units', 'public');
        }

        BusinessUnit::create($validated);

        return redirect()->route('admin.units.index')->with('success', 'Business Unit berhasil ditambahkan!');
    }

    public function edit(BusinessUnit $unit)
    {
        return view('admin.units.edit', compact('unit'));
    }

    public function update(Request $request, BusinessUnit $unit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'services_list' => 'nullable|string',
            'instagram' => 'nullable|string|max:100',
            'website' => 'nullable|url|max:255',
            'color' => 'nullable|string|max:20',
            'logo' => 'nullable|image|max:1024',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            if ($unit->logo)
                Storage::disk('public')->delete($unit->logo);
            $validated['logo'] = $request->file('logo')->store('units', 'public');
        }

        $unit->update($validated);

        return redirect()->route('admin.units.index')->with('success', 'Business Unit berhasil diperbarui!');
    }

    public function destroy(BusinessUnit $unit)
    {
        if ($unit->logo)
            Storage::disk('public')->delete($unit->logo);
        $unit->delete();
        return redirect()->route('admin.units.index')->with('success', 'Business Unit berhasil dihapus!');
    }
}
