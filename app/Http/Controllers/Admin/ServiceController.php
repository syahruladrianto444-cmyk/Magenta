<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'offered_services' => 'nullable|array',
            'scope_details' => 'nullable|array',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active', true);

        // Filter out empty rows from arrays
        if (!empty($validated['offered_services'])) {
            $validated['offered_services'] = array_values(array_filter($validated['offered_services'], function($item) {
                return !empty($item['title']);
            }));
        }
        
        if (!empty($validated['scope_details'])) {
            $validated['scope_details'] = array_values(array_filter($validated['scope_details'], function($item) {
                return !empty($item['title']);
            }));
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil ditambahkan!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:50',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'offered_services' => 'nullable|array',
            'scope_details' => 'nullable|array',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');

        // Filter out empty rows from arrays
        if (!empty($validated['offered_services'])) {
            $validated['offered_services'] = array_values(array_filter($validated['offered_services'], function($item) {
                return !empty($item['title']);
            }));
        } else {
            $validated['offered_services'] = [];
        }
        
        if (!empty($validated['scope_details'])) {
            $validated['scope_details'] = array_values(array_filter($validated['scope_details'], function($item) {
                return !empty($item['title']);
            }));
        } else {
            $validated['scope_details'] = [];
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service berhasil dihapus!');
    }
}
