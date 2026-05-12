<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $stats = Setting::getByGroup('stats');
        
        $whyChooseUsJson = Setting::get('why_choose_us', '[]');
        $whyChooseUs = json_decode($whyChooseUsJson, true) ?: [];

        $ctas = Setting::getByGroup('cta');

        return view('admin.settings.index', compact('stats', 'whyChooseUs', 'ctas'));
    }

    public function update(Request $request)
    {
        // Handle statistics
        if ($request->has('stats')) {
            foreach ($request->input('stats') as $key => $value) {
                Setting::set($key, $value, 'text', 'stats');
            }
        }

        // Handle Global CTAs
        if ($request->has('cta')) {
            foreach ($request->input('cta') as $key => $value) {
                Setting::set($key, $value, 'text', 'cta');
            }
        }

        // Handle Why Choose Us (Repeater)
        if ($request->has('why_choose_us')) {
            $whyChooseUsData = [];
            $titles = $request->input('why_choose_us.title', []);
            $icons = $request->input('why_choose_us.icon', []);
            $descs = $request->input('why_choose_us.desc', []);

            foreach ($titles as $index => $title) {
                if (!empty($title)) {
                    $whyChooseUsData[] = [
                        'title' => $title,
                        'icon' => $icons[$index] ?? 'check-circle',
                        'desc' => $descs[$index] ?? '',
                    ];
                }
            }
            Setting::set('why_choose_us', json_encode($whyChooseUsData), 'json', 'content');
        } else {
             Setting::set('why_choose_us', json_encode([]), 'json', 'content');
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
