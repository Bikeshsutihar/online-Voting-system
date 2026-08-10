@extends('layouts.app')

@section('title', 'Candidate Nomination Application - UniVote')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4 sm:px-6">
    <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-xl space-y-6">
        <div class="text-center">
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-3 border border-blue-100">
                <i class="fa-solid fa-user-plus text-2xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold font-heading text-slate-900">Run for Student Council</h2>
            <p class="text-xs text-slate-500 mt-1">Submit your candidacy application for administrative approval.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl text-xs space-y-1">
                @foreach($errors->all() as $error)
                    <p><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if($activeElection)
            <form action="{{ route('candidate.apply.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="election_id" value="{{ $activeElection->id }}">

                <div class="p-4 rounded-2xl bg-blue-50/70 border border-blue-100 flex items-center justify-between text-xs text-blue-900 font-semibold">
                    <span><i class="fa-solid fa-box-archive text-blue-600 mr-1.5"></i> Target Election: {{ $activeElection->title }}</span>
                    <span class="px-2.5 py-1 rounded-full bg-blue-600 text-white text-[11px] font-bold">Active Nomination</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 mb-1">Full Candidate Name *</label>
                        <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Alex Morgan" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold text-slate-700 mb-1">University Email *</label>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="alex@university.edu" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label for="student_id" class="block text-xs font-bold text-slate-700 mb-1">Student ID Number *</label>
                        <input type="text" name="student_id" id="student_id" required value="{{ old('student_id') }}" placeholder="STU-2026-088" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label for="phone_no" class="block text-xs font-bold text-slate-700 mb-1">Phone Number *</label>
                        <input type="text" name="phone_no" id="phone_no" required value="{{ old('phone_no') }}" placeholder="+1 555-0177" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label for="class" class="block text-xs font-bold text-slate-700 mb-1">Class / Department *</label>
                        <input type="text" name="class" id="class" required value="{{ old('class') }}" placeholder="BSc Computer Science - 4th Year" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                    </div>

                    <div>
                        <label for="dob" class="block text-xs font-bold text-slate-700 mb-1">Date of Birth *</label>
                        <input type="date" name="dob" id="dob" required value="{{ old('dob') }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label for="party_name" class="block text-xs font-bold text-slate-700 mb-1">Party / Alliance Name *</label>
                    <input type="text" name="party_name" id="party_name" required value="{{ old('party_name') }}" placeholder="Youth & Student Empowerment Party" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                    <div>
                        <label for="logo" class="block text-xs font-bold text-slate-700 mb-1">Party Logo Image *</label>
                        <input type="file" name="logo" id="logo" required accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-[11px] text-slate-400 mt-1">Uploaded to public/uploads/candidate_logos</p>
                    </div>

                    <div>
                        <label for="id_card_photo" class="block text-xs font-bold text-slate-700 mb-1">Photo *</label>
                        <input type="file" name="id_card_photo" id="id_card_photo" required accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-[11px] text-slate-400 mt-1">Uploaded to public/uploads/candidate_ids</p>
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-600/30 transition-all flex items-center justify-center">
                    <i class="fa-solid fa-paper-plane mr-2"></i> Submit Application for Admin Approval
                </button>
            </form>
        @else
            <div class="text-center py-8 text-slate-400 text-sm">
                <i class="fa-solid fa-calendar-xmark text-4xl mb-3 text-slate-300"></i>
                <p>No active election currently taking candidate applications.</p>
            </div>
        @endif
    </div>
</div>
@endsection
