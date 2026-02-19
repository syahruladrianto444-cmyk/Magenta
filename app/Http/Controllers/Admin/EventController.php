<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['creator', 'users'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $clients = User::where('role', 'client')->orderBy('name')->get();
        return view('admin.events.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'youtube_video_id' => 'nullable|string|max:255',
            'status' => 'required|in:preparing,live,completed',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'client_ids' => 'nullable|array',
            'client_ids.*' => 'exists:users,id',
        ]);

        $event = Event::create([
            'name' => $validated['name'],
            'youtube_video_id' => $validated['youtube_video_id'] ?? null,
            'status' => $validated['status'],
            'event_date' => $validated['event_date'] ?? null,
            'description' => $validated['description'] ?? null,
            'created_by' => auth()->id(),
        ]);

        // Attach selected clients as PIC
        if (!empty($validated['client_ids'])) {
            foreach ($validated['client_ids'] as $clientId) {
                $event->users()->attach($clientId, ['role' => 'pic']);
            }
        }

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(Event $event)
    {
        $event->load('users');
        $clients = User::where('role', 'client')->orderBy('name')->get();
        $assignedClientIds = $event->users->pluck('id')->toArray();

        return view('admin.events.edit', compact('event', 'clients', 'assignedClientIds'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'youtube_video_id' => 'nullable|string|max:255',
            'status' => 'required|in:preparing,live,completed',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'client_ids' => 'nullable|array',
            'client_ids.*' => 'exists:users,id',
        ]);

        $event->update([
            'name' => $validated['name'],
            'youtube_video_id' => $validated['youtube_video_id'] ?? null,
            'status' => $validated['status'],
            'event_date' => $validated['event_date'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        // Sync assigned clients
        $syncData = [];
        if (!empty($validated['client_ids'])) {
            foreach ($validated['client_ids'] as $clientId) {
                $syncData[$clientId] = ['role' => 'pic'];
            }
        }
        $event->users()->sync($syncData);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}
