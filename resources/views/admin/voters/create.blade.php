@extends('layouts.admin')

@section('title', 'Create Voter - UniVote Admin')
@section('page_heading', 'Register New Student Voter')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
    <div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-xl font-bold font-heading text-slate-900">Voter Account Creation</h2>
            <p class="text-xs text-slate-500">Provide student information and upload ID card photo.</p>
        </div>
        <a href="{{ route('admin.voters.index') }}" class="text-slate-500 hover:text-slate-800 text-xs font-semibold">
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

    <form action="{{ route('admin.voters.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-xs font-bold text-slate-700 mb-1">Full Name *</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="John Doe" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 mb-1">Email Address *</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="john@university.edu" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="student_id" class="block text-xs font-bold text-slate-700 mb-1">Student ID (Unique) *</label>
                <input type="text" name="student_id" id="student_id" required value="{{ old('student_id') }}" placeholder="STU-2026-100" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="phone_no" class="block text-xs font-bold text-slate-700 mb-1">Phone Number *</label>
                <input type="text" name="phone_no" id="phone_no" required value="{{ old('phone_no') }}" placeholder="+1 555-0188" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="class" class="block text-xs font-bold text-slate-700 mb-1">Class / Department *</label>
                <input type="text" name="class" id="class" required value="{{ old('class') }}" placeholder="IT - 3rd Year" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="dob" class="block text-xs font-bold text-slate-700 mb-1">Date of Birth *</label>
                <input type="date" name="dob" id="dob" required value="{{ old('dob') }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-slate-700 mb-1">Voter Password *</label>
                <input type="password" name="password" id="password" required placeholder="Minimum 6 characters" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="id_card_photo" class="block text-xs font-bold text-slate-700 mb-1">Student ID Card Photo *</label>
                <input type="file" name="id_card_photo" id="id_card_photo" required accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>
        </div>

        <div class="pt-2">
            <label class="flex items-center space-x-2 text-xs font-semibold text-slate-700">
                <input type="checkbox" name="is_verified" value="1" checked class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                <span>Mark Voter Account as Verified Immediately</span>
            </label>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-slate-100">
            <a href="{{ route('admin.voters.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-xs font-semibold hover:bg-slate-50">Cancel</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-2.5 rounded-xl text-xs shadow-md shadow-blue-600/30">
                <i class="fa-solid fa-save mr-1.5"></i> Register Voter
            </button>
        </div>
    </form>
</div>
@endsection
