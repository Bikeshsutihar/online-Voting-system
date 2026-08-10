@extends('layouts.admin')

@section('title', 'Candidate Management - UniVote Admin')
@section('page_heading', 'Candidate Management')

@section('content')
<div class="space-y-6">
    <!-- Header Controls & Filters -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 bg-white p-4 sm:p-6 rounded-2xl border border-slate-200 shadow-sm">
        <form action="{{ route('admin.candidates.index') }}" method="GET" class="flex flex-wrap items-center gap-3 flex-grow">
            <div class="relative flex-grow max-w-xs">
                <i class="fa-solid fa-search absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, student ID, party..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>
            <select name="status" onchange="this.form.submit()" class="bg-slate-50 border border-slate-300 rounded-xl px-3 py-2 text-xs focus:outline-none focus:border-blue-500">
                <option value="">All Statuses</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            <button type="submit" class="bg-slate-800 text-white px-4 py-2 rounded-xl text-xs font-semibold hover:bg-slate-700">Filter</button>
        </form>

        <a href="{{ route('admin.candidates.create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-5 py-2.5 rounded-xl text-xs shadow-md shadow-blue-600/30 flex items-center justify-center">
            <i class="fa-solid fa-plus mr-1.5"></i> Add New Candidate
        </a>
    </div>

    <!-- Candidate Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-semibold uppercase border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4">Candidate</th>
                        <th class="px-6 py-4">Party & Logo</th>
                        <th class="px-6 py-4">Class / Student ID</th>
                        <th class="px-6 py-4">ID Photo</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($candidates as $candidate)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 overflow-hidden flex-shrink-0">
                                        <img src="{{ asset($candidate->id_card_photo) }}" alt="{{ $candidate->name }}" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->name) }}'">
                                    </div>
                                    <div>
                                        <span class="font-bold text-slate-900 text-sm block">{{ $candidate->name }}</span>
                                        <span class="text-[11px] text-slate-500">{{ $candidate->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <img src="{{ asset($candidate->logo) }}" alt="{{ $candidate->party_name }}" class="w-6 h-6 object-contain rounded bg-slate-50 p-0.5 border border-slate-200" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->party_name) }}'">
                                    <span class="font-semibold text-slate-800">{{ $candidate->party_name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-medium text-slate-800 block">{{ $candidate->class }}</span>
                                <span class="font-mono text-[11px] text-slate-500">{{ $candidate->student_id }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ asset($candidate->id_card_photo) }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                                    <i class="fa-solid fa-image mr-1"></i> View Image
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                @if($candidate->status === 'approved')
                                    <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 font-bold text-[11px] inline-flex items-center">
                                        <i class="fa-solid fa-check-circle mr-1"></i> Approved
                                    </span>
                                @elseif($candidate->status === 'rejected')
                                    <span class="px-2.5 py-1 rounded-full bg-red-100 text-red-700 font-bold text-[11px] inline-flex items-center">
                                        <i class="fa-solid fa-times-circle mr-1"></i> Rejected
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full bg-amber-100 text-amber-700 font-bold text-[11px] inline-flex items-center">
                                        <i class="fa-solid fa-clock mr-1"></i> Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                @if($candidate->status === 'pending')
                                    <form action="{{ route('admin.candidates.approve', $candidate->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-2.5 py-1 rounded-lg text-[11px]" title="Approve Candidate">
                                            <i class="fa-solid fa-check"></i> Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.candidates.reject', $candidate->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold px-2.5 py-1 rounded-lg text-[11px]" title="Reject Candidate">
                                            <i class="fa-solid fa-ban"></i> Reject
                                        </button>
                                    </form>
                                @endif

                                <a href="{{ route('admin.candidates.show', $candidate->id) }}" class="text-slate-600 hover:text-blue-600 px-1.5 py-1" title="View Details">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </a>
                                <a href="{{ route('admin.candidates.edit', $candidate->id) }}" class="text-slate-600 hover:text-indigo-600 px-1.5 py-1" title="Edit Candidate">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </a>

                                <form action="{{ route('admin.candidates.destroy', $candidate->id) }}" method="POST" class="inline delete-candidate-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDeleteCandidate(this)" class="text-red-500 hover:text-red-700 px-1.5 py-1" title="Delete Candidate">
                                        <i class="fa-solid fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400 text-xs">
                                <i class="fa-solid fa-folder-open text-3xl mb-2 block"></i>
                                No candidates found matching your criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200">
            {{ $candidates->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDeleteCandidate(btn) {
        Swal.fire({
            title: 'Delete Candidate?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes, delete!'
        }).then((result) => {
            if (result.isConfirmed) {
                btn.closest('form').submit();
            }
        });
    }
</script>
@endsection
