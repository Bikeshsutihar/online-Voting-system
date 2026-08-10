@extends('layouts.admin')

@section('title', 'Create Election - UniVote Admin')
@section('page_heading', 'Create New Election Session')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
    <div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-xl font-bold font-heading text-slate-900">Election Details</h2>
            <p class="text-xs text-slate-500">Define election title, description, and schedule timeline.</p>
        </div>
        <a href="{{ route('admin.elections.index') }}" class="text-slate-500 hover:text-slate-800 text-xs font-semibold">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to List
        </a>
    </div>

    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl text-xs space-y-1">
            @foreach($errors->all() as $error)
                <p><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.elections.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block text-xs font-bold text-slate-700 mb-1">Election Title *</label>
            <input type="text" name="title" id="title" required value="{{ old('title') }}" placeholder="e.g. Student Union Executive Council Election 2026" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
        </div>

        <div>
            <label for="description" class="block text-xs font-bold text-slate-700 mb-1">Description / Purpose</label>
            <textarea name="description" id="description" rows="3" placeholder="Brief summary of the positions being contested..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="start_date" class="block text-xs font-bold text-slate-700 mb-1">Start Date & Time *</label>
                <input type="datetime-local" name="start_date" id="start_date" required value="{{ old('start_date', now()->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="end_date" class="block text-xs font-bold text-slate-700 mb-1">End Date & Time *</label>
                <input type="datetime-local" name="end_date" id="end_date" required value="{{ old('end_date', now()->addDays(7)->format('Y-m-d\TH:i')) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>
        </div>

        <div>
            <label for="status" class="block text-xs font-bold text-slate-700 mb-1">Election Status *</label>
            <select name="status" id="status" required class="w-full sm:w-1/2 px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                <option value="upcoming" {{ old('status') === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active (Set as Current Election)</option>
                <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-slate-100">
            <a href="{{ route('admin.elections.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-xs font-semibold hover:bg-slate-50">Cancel</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-2.5 rounded-xl text-xs shadow-md shadow-blue-600/30">
                <i class="fa-solid fa-save mr-1.5"></i> Save Election
            </button>
        </div>
    </form>
</div>
@endsection
