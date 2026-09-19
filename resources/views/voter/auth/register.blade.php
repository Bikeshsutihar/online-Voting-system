@extends('layouts.app')

@section('title', 'Voter Registration - UniVote System')

@section('content')
<div class="max-w-2xl mx-auto py-12 px-4 sm:px-6">
    <div class="bg-black p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-xl space-y-6">
        <div class="text-center">
            <div class="w-14 h-14 bg-blue-500 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-3 border border-blue-100">
                <i class="fa-solid fa-user-check text-xl"></i>
            </div>
            <h2 class="text-2xl font-extrabold font-heading text-slate-900">Student Voter Registration</h2>
            <p class="text-xs text-slate-500 mt-1">Create your voter profile with student verification photo ID.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-500 border border-red-200 text-red-700 p-4 rounded-xl text-xs space-y-1">
                @foreach($errors->all() as $error)
                    <p><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('voter.register') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-700 mb-1">Full Name *</label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Bikesh Kumar Sutihar" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 mb-1">Email Address *</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="Example@gmail.com" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label for="student_id" class="block text-xs font-bold text-slate-700 mb-1">Student ID (Unique) *</label>
                    <input type="text" name="student_id" id="student_id" required value="{{ old('student_id') }}" placeholder="e.g. STU-2026-055" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label for="phone_no" class="block text-xs font-bold text-slate-700 mb-1">Phone Number *</label>
                    <input type="text" name="phone_no" id="phone_no" required value="{{ old('phone_no') }}" placeholder="98xxxxxxxx" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label for="class" class="block text-xs font-bold text-slate-700 mb-1">Class / Department *</label>
                    <input type="text" name="class" id="class" required value="{{ old('class') }}" placeholder="BCA_4th_Sem" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label for="dob" class="block text-xs font-bold text-slate-700 mb-1">Date of Birth *</label>
                    <input type="date" name="dob" id="dob" required value="{{ old('dob') }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <div>
                <label for="id_card_photo" class="block text-xs font-bold text-slate-700 mb-1">Photo *</label>
                <input type="file" name="id_card_photo" id="id_card_photo" required accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-[11px] text-slate-400 mt-1">Image will be saved in public/uploads/voter_ids</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 mb-1">Password *</label>
                    <input type="password" name="password" id="password" required placeholder="Minimum 6 characters" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-slate-700 mb-1">Confirm Password *</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Re-enter password" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <button type="submit" class="w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-600/30 transition-all flex items-center justify-center">
                <i class="fa-solid fa-user-check mr-2"></i> Register Account & Complete Verification
            </button>
        </form>

        <p class="text-center text-xs text-slate-500 pt-2 border-t border-slate-100">
            Already registered? <a href="{{ route('voter.login') }}" class="font-bold text-blue-600 hover:underline">Log in here</a>
        </p>
    </div>
</div>
@endsection
