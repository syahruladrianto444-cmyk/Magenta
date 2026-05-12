@extends('layouts.admin')

@section('title', 'CMS Settings')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">CMS Settings</h1>
    <p class="text-gray-500 dark:text-gray-400 mt-2">Manage dynamic content for the website.</p>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8" id="settings-form">
    @csrf

    {{-- Global CTA Settings --}}
    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 shadow-sm">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Global CTAs</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CTA Headline</label>
                <input type="text" name="cta[headline]" value="{{ $ctas['headline'] ?? 'Let\'s Build Something Meaningful Together' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CTA Subheadline</label>
                <input type="text" name="cta[subheadline]" value="{{ $ctas['subheadline'] ?? 'Every great experience starts with a conversation. Tell us about your vision.' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Text</label>
                <input type="text" name="cta[button_text]" value="{{ $ctas['button_text'] ?? 'Discuss Your Project' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">WhatsApp Number (General)</label>
                <input type="text" name="cta[whatsapp_general]" value="{{ $ctas['whatsapp_general'] ?? '6281821878787' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
        </div>
    </div>

    {{-- Experience in Numbers --}}
    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 shadow-sm">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Experience in Numbers</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Events Managed (Value)</label>
                <input type="text" name="stats[events_managed]" value="{{ $stats['events_managed'] ?? '100+' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Cities Reached</label>
                <input type="text" name="stats[cities_reached]" value="{{ $stats['cities_reached'] ?? '20+' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Audience Engagement</label>
                <input type="text" name="stats[audience_engagement]" value="{{ $stats['audience_engagement'] ?? '100K+' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Business Units</label>
                <input type="text" name="stats[business_units]" value="{{ $stats['business_units'] ?? '3' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Clients Label (e.g. Multi Sector)</label>
                <input type="text" name="stats[clients_label]" value="{{ $stats['clients_label'] ?? 'Multi Sector' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Years Experience</label>
                <input type="text" name="stats[years_experience]" value="{{ $stats['years_experience'] ?? '10+' }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>
        </div>
    </div>

    {{-- Why Choose Us Repeater --}}
    <div class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 shadow-sm">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Why Choose Us</h2>
            <button type="button" onclick="addWhyChooseUsItem()" class="px-4 py-2 bg-gray-100 dark:bg-navy-700 text-gray-700 dark:text-white rounded-lg text-sm font-medium hover:bg-gray-200 dark:hover:bg-navy-600">
                + Add Item
            </button>
        </div>
        
        <div id="why-choose-us-container" class="space-y-4">
            @foreach($whyChooseUs as $index => $item)
                <div class="why-item flex items-start gap-4 p-4 border border-gray-200 dark:border-navy-600 rounded-xl bg-gray-50 dark:bg-navy-900">
                    <div class="flex-1 grid md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Lucide Icon (e.g., brain, users)</label>
                            <input type="text" name="why_choose_us[icon][]" value="{{ $item['icon'] }}" class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Title</label>
                            <input type="text" name="why_choose_us[title][]" value="{{ $item['title'] }}" required class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Description</label>
                            <textarea name="why_choose_us[desc][]" rows="2" class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white">{{ $item['desc'] }}</textarea>
                        </div>
                    </div>
                    <button type="button" onclick="this.closest('.why-item').remove()" class="mt-6 p-2 text-red-500 hover:bg-red-50 rounded-lg">
                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-8 py-4 bg-magenta-500 text-white font-bold rounded-xl hover:bg-magenta-600 transition-colors shadow-lg">
            Save All Settings
        </button>
    </div>
</form>

{{-- Template for new Why Choose Us items --}}
<template id="why-choose-us-template">
    <div class="why-item flex items-start gap-4 p-4 border border-gray-200 dark:border-navy-600 rounded-xl bg-gray-50 dark:bg-navy-900">
        <div class="flex-1 grid md:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Lucide Icon (e.g., brain)</label>
                <input type="text" name="why_choose_us[icon][]" value="star" class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Title</label>
                <input type="text" name="why_choose_us[title][]" value="" required class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 mb-1">Description</label>
                <textarea name="why_choose_us[desc][]" rows="2" class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white"></textarea>
            </div>
        </div>
        <button type="button" onclick="this.closest('.why-item').remove()" class="mt-6 p-2 text-red-500 hover:bg-red-50 rounded-lg">
            <i data-lucide="trash-2" class="w-5 h-5"></i>
        </button>
    </div>
</template>

<script>
function addWhyChooseUsItem() {
    const template = document.getElementById('why-choose-us-template');
    const container = document.getElementById('why-choose-us-container');
    container.appendChild(template.content.cloneNode(true));
    lucide.createIcons();
}
</script>
@endsection
