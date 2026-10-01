@extends('layouts.admin')

@section('page_title', 'Categories')
@section('page_subtitle', 'Manage your menu categories')

@section('content')

<!-- Stats Row -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="card-3d bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-indigo-100 text-sm">Total Categories</p>
                <p class="text-3xl font-bold mt-1">{{ $categories->count() }}</p>
            </div>
            <i class="fas fa-tags text-4xl text-indigo-200 opacity-50"></i>
        </div>
    </div>
    <div class="card-3d bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-emerald-100 text-sm">Active</p>
                <p class="text-3xl font-bold mt-1">{{ $categories->where('status', 1)->count() }}</p>
            </div>
            <i class="fas fa-check-circle text-4xl text-emerald-200 opacity-50"></i>
        </div>
    </div>
    <div class="card-3d bg-gradient-to-br from-rose-500 to-orange-500 rounded-2xl p-6 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-rose-100 text-sm">Inactive</p>
                <p class="text-3xl font-bold mt-1">{{ $categories->where('status', 0)->count() }}</p>
            </div>
            <i class="fas fa-times-circle text-4xl text-rose-200 opacity-50"></i>
        </div>
    </div>
</div>

<!-- Add Button -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold text-slate-700">All Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn-gradient text-white px-6 py-3 rounded-xl font-semibold shadow-lg">
        <i class="fas fa-plus mr-2"></i>Add Category
    </a>
</div>

<!-- Table -->
<div class="card-3d bg-white rounded-2xl shadow-lg overflow-hidden">
    @if($categories->count() > 0)
    <table class="w-full">
        <thead>
            <tr class="bg-gradient-to-r from-slate-50 to-slate-100">
                <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">#</th>
                <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Category</th>
                <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Slug</th>
                <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Created</th>
                <th class="px-6 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @foreach($categories as $category)
            <tr class="hover:bg-indigo-50/30 transition-colors">
                <td class="px-6 py-4 text-sm text-slate-500">{{ $loop->iteration }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
                            <i class="fas fa-folder text-indigo-500"></i>
                        </div>
                        <span class="font-semibold text-slate-700">{{ $category->name }}</span>
                    </div>
                </td>
                <td class="px-6 py-4 text-sm text-slate-400 font-mono">{{ $category->slug }}</td>
                <td class="px-6 py-4">
                    @if($category->status)
                        <span class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Active
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 bg-red-50 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                            <span class="w-2 h-2 rounded-full bg-red-500"></span> Inactive
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-slate-400">{{ $category->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4 text-center">
                    <div class="flex items-center justify-center gap-2">
                        <a href="#" class="w-9 h-9 rounded-lg bg-blue-50 hover:bg-blue-100 flex items-center justify-center text-blue-600 transition-colors" title="Edit">
                            <i class="fas fa-edit text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-red-50 hover:bg-red-100 flex items-center justify-center text-red-600 transition-colors" title="Delete">
                            <i class="fas fa-trash text-sm"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="text-center py-16">
        <i class="fas fa-folder-open text-6xl text-slate-200 mb-4"></i>
        <p class="text-slate-400 text-lg">No categories yet</p>
        <a href="{{ route('categories.create') }}" class="btn-gradient inline-block text-white px-6 py-3 rounded-xl font-semibold shadow-lg mt-4">
            <i class="fas fa-plus mr-2"></i>Add First Category
        </a>
    </div>
    @endif
</div>

@endsection