@extends('layouts.admin')

@section('title', 'Edit Candidate - UniVote Admin')
@section('page_heading', 'Edit Candidate Details')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
    <div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
            <h2 class="text-xl font-bold font-heading text-slate-900">Edit Candidate: {{ $candidate->name }}</h2>
            <p class="text-xs text-slate-500">Update candidate details, photos, or approval status.</p>
        </div>
        <a href="{{ route('admin.candidates.index') }}" class="text-slate-500 hover:text-slate-800 text-xs font-semibold">
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

    <form action="{{ route('admin.candidates.update', $candidate->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-xs font-bold text-slate-700 mb-1">Full Name *</label>
                <input type="text" name="name" id="name" required value="{{ old('name', $candidate->name) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 mb-1">Email Address *</label>
                <input type="email" name="email" id="email" required value="{{ old('email', $candidate->email) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="student_id" class="block text-xs font-bold text-slate-700 mb-1">Student ID *</label>
                <input type="text" name="student_id" id="student_id" required value="{{ old('student_id', $candidate->student_id) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="phone_no" class="block text-xs font-bold text-slate-700 mb-1">Phone Number *</label>
                <input type="text" name="phone_no" id="phone_no" required value="{{ old('phone_no', $candidate->phone_no) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="class" class="block text-xs font-bold text-slate-700 mb-1">Class / Faculty *</label>
                <input type="text" name="class" id="class" required value="{{ old('class', $candidate->class) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="dob" class="block text-xs font-bold text-slate-700 mb-1">Date of Birth *</label>
                <input type="date" name="dob" id="dob" required value="{{ old('dob', $candidate->dob->format('Y-m-d')) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="party_name" class="block text-xs font-bold text-slate-700 mb-1">Party Name *</label>
                <input type="text" name="party_name" id="party_name" required value="{{ old('party_name', $candidate->party_name) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label for="election_id" class="block text-xs font-bold text-slate-700 mb-1">Target Election *</label>
                <select name="election_id" id="election_id" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                    <option value="">Select Election</option>
                    @foreach($elections as $election)
                        <option value="{{ $election->id }}" {{ old('election_id', $candidate->election_id) == $election->id ? 'selected' : '' }}>
                            {{ $election->title }} ({{ ucfirst($election->status) }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- File Upload Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
            <div>
                <label for="logo" class="block text-xs font-bold text-slate-700 mb-1">Party Logo (Leave blank to keep current)</label>
                <input type="file" name="logo" id="logo" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <div class="mt-2 flex items-center space-x-2">
                    <span class="text-[11px] text-slate-400">Current:</span>
                    <img src="{{ asset($candidate->logo) }}" alt="Logo" class="w-8 h-8 object-contain rounded border" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->party_name) }}'">
                </div>
            </div>

            <div>
                <label for="id_card_photo" class="block text-xs font-bold text-slate-700 mb-1">ID Card Photo (Leave blank to keep current)</label>
                <input type="file" name="id_card_photo" id="id_card_photo" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <div class="mt-2 flex items-center space-x-2">
                    <span class="text-[11px] text-slate-400">Current:</span>
                    <img src="{{ asset($candidate->id_card_photo) }}" alt="ID Card" class="w-8 h-8 object-cover rounded border" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->name) }}'">
                </div>
            </div>
        </div>

        <div>
            <label for="status" class="block text-xs font-bold text-slate-700 mb-1">Approval Status *</label>
            <select name="status" id="status" required class="w-full sm:w-1/2 px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
                <option value="pending" {{ old('status', $candidate->status) === 'pending' ? 'selected' : '' }}>Pending Review</option>
                <option value="approved" {{ old('status', $candidate->status) === 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ old('status', $candidate->status) === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-slate-100">
            <a href="{{ route('admin.candidates.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-xs font-semibold hover:bg-slate-50">Cancel</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-2.5 rounded-xl text-xs shadow-md shadow-blue-600/30">
                <i class="fa-solid fa-save mr-1.5"></i> Update Candidate
            </button>
        </div>
    </form>
</div>
@endsection
