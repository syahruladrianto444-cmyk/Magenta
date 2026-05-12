@extends('layouts.admin')

@section('title', isset($service) ? 'Edit Service' : 'Add Service')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.services.index') }}"
            class="inline-flex items-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i><span>Kembali</span>
        </a>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ isset($service) ? 'Edit Service' : 'Add Service' }}
        </h1>
    </div>

    <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}"
        method="POST" class="max-w-3xl">
        @csrf
        @if(isset($service)) @method('PUT') @endif

        <div
            class="bg-white dark:bg-navy-800 rounded-2xl border border-gray-200 dark:border-navy-700 p-8 space-y-6 shadow-sm dark:shadow-none">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Icon (Lucide icon
                    name)</label>
                <input type="text" name="icon" value="{{ old('icon', $service->icon ?? 'briefcase') }}"
                    placeholder="briefcase, calendar, users..."
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                <p class="mt-1 text-sm text-gray-500">Icons: <a href="https://lucide.dev/icons" target="_blank"
                        class="text-magenta-500">lucide.dev/icons</a></p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Excerpt</label>
                <textarea name="excerpt" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('excerpt', $service->excerpt ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" rows="8"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">{{ old('description', $service->description ?? '') }}</textarea>
            </div>

            <!-- Dynamic Offered Services -->
            <div x-data="{
                services: {{ old('offered_services') ? json_encode(old('offered_services')) : '[{icon: \'briefcase\', title: \'\', desc: \'\'}]' }}
            }" class="border-t border-gray-200 dark:border-navy-700 pt-6">
                <div class="flex items-center justify-between mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Layanan yang Disediakan (Offered Services)</label>
                    <button type="button" @click="services.push({icon: 'briefcase', title: '', desc: ''})" class="px-3 py-1 bg-magenta-500/10 text-magenta-500 rounded-lg text-sm font-medium hover:bg-magenta-500/20">
                        + Tambah Layanan
                    </button>
                </div>
                
                <div class="space-y-4">
                    <template x-for="(service, index) in services" :key="index">
                        <div class="flex gap-4 items-start bg-gray-50 dark:bg-navy-900 p-4 rounded-xl border border-gray-200 dark:border-navy-700">
                            <div class="flex-1 space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Icon</label>
                                        <input type="text" x-model="service.icon" :name="`offered_services[${index}][icon]`" placeholder="lucide icon name" class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white outline-none focus:border-magenta-500">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Title</label>
                                        <input type="text" x-model="service.title" :name="`offered_services[${index}][title]`" placeholder="Service title" class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white outline-none focus:border-magenta-500">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Description</label>
                                    <textarea x-model="service.desc" :name="`offered_services[${index}][desc]`" rows="2" placeholder="Short description" class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white outline-none focus:border-magenta-500"></textarea>
                                </div>
                            </div>
                            <button type="button" @click="services.splice(index, 1)" class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Dynamic Scope Details -->
            <div x-data="{
                scopes: {{ old('scope_details') ? json_encode(old('scope_details')) : '[{title: \'\', desc: \'\'}]' }}
            }" class="border-t border-gray-200 dark:border-navy-700 pt-6">
                <div class="flex items-center justify-between mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rincian Cakupan Layanan (Scope Details)</label>
                    <button type="button" @click="scopes.push({title: '', desc: ''})" class="px-3 py-1 bg-magenta-500/10 text-magenta-500 rounded-lg text-sm font-medium hover:bg-magenta-500/20">
                        + Tambah Cakupan
                    </button>
                </div>
                
                <div class="space-y-4">
                    <template x-for="(scope, index) in scopes" :key="index">
                        <div class="flex gap-4 items-start bg-gray-50 dark:bg-navy-900 p-4 rounded-xl border border-gray-200 dark:border-navy-700">
                            <div class="flex-1 space-y-4">
                                <div>
                                    <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Title</label>
                                    <input type="text" x-model="scope.title" :name="`scope_details[${index}][title]`" placeholder="Scope title" class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white outline-none focus:border-magenta-500">
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Description</label>
                                    <textarea x-model="scope.desc" :name="`scope_details[${index}][desc]`" rows="2" placeholder="Scope description" class="w-full px-3 py-2 bg-white dark:bg-navy-800 border border-gray-300 dark:border-navy-700 rounded-lg text-sm text-gray-900 dark:text-white outline-none focus:border-magenta-500"></textarea>
                                </div>
                            </div>
                            <button type="button" @click="scopes.splice(index, 1)" class="p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </template>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-navy-900 border border-gray-300 dark:border-navy-700 rounded-xl text-gray-900 dark:text-white focus:border-magenta-500 outline-none">
                </div>
                <div class="flex items-center pt-8">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 rounded bg-gray-50 dark:bg-navy-900 border-gray-300 dark:border-navy-700 text-magenta-500">
                        <span class="ml-3 text-gray-700 dark:text-gray-300">Active</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <button type="submit"
                class="px-8 py-3 bg-magenta-500 text-white font-semibold rounded-xl hover:bg-magenta-600 transition-colors">{{ isset($service) ? 'Update' : 'Save' }}
                Service</button>
            <a href="{{ route('admin.services.index') }}"
                class="px-8 py-3 border border-gray-300 dark:border-navy-600 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-100 dark:hover:bg-navy-800 transition-colors">Cancel</a>
        </div>
    </form>
@endsection