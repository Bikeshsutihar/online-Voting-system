@extends('layouts.admin')

@section('title', 'Voter Management - UniVote Admin')
@section('page_heading', 'Voter Management')

@section('content')
<div class="space-y-6">
    <!-- Search & Filter Controls -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 bg-white p-4 sm:p-6 rounded-2xl border border-slate-200 shadow-sm">
        <form action="{{ route('admin.voters.index') }}" method="GET" class="flex items-center space-x-3 flex-grow max-w-md">
            <div class="relative flex-grow">
                <i class="fa-solid fa-search absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, student ID, email..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" class="bg-slate-800 text-white px-4 py-2 rounded-xl text-xs font-semibold hover:bg-slate-700">Search</button>
        </form>

        <a href="{{ route('admin.voters.create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-5 py-2.5 rounded-xl text-xs shadow-md shadow-blue-600/30 flex items-center justify-center">
            <i class="fa-solid fa-user-plus mr-1.5"></i> Register New Voter
        </a>
    </div>

    <!-- Voters Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-semibold uppercase border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4">Voter Name</th>
                        <th class="px-6 py-4">Student ID / Class</th>
                        <th class="px-6 py-4">Contact Info</th>
                        <th class="px-6 py-4">ID Card Photo</th>
                        <th class="px-6 py-4">Verification</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($voters as $voter)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 rounded-full bg-slate-100 border border-slate-200 overflow-hidden flex-shrink-0">
                                        <img src="{{ asset($voter->id_card_photo) }}" alt="{{ $voter->name }}" class="w-full h-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($voter->name) }}'">
                                    </div>
                                    <span class="font-bold text-slate-900 text-sm">{{ $voter->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold font-mono text-slate-800 block">{{ $voter->student_id }}</span>
                                <span class="text-[11px] text-slate-500">{{ $voter->class }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-slate-800 block">{{ $voter->email }}</span>
                                <span class="text-slate-400 text-[11px]">{{ $voter->phone_no }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ asset($voter->id_card_photo) }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                                    <i class="fa-solid fa-id-badge mr-1"></i> View Photo
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.voters.verify', $voter->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    @if($voter->is_verified)
                                        <button type="submit" class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 font-bold text-[11px] inline-flex items-center hover:bg-emerald-200">
                                            <i class="fa-solid fa-shield-check mr-1"></i> Verified
                                        </button>
                                    @else
                                        <button type="submit" class="px-2.5 py-1 rounded-full bg-amber-100 text-amber-700 font-bold text-[11px] inline-flex items-center hover:bg-amber-200">
                                            <i class="fa-solid fa-clock mr-1"></i> Unverified
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.voters.show', $voter->id) }}" class="text-slate-600 hover:text-blue-600 px-1.5 py-1" title="View Voter Details">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </a>
                                <a href="{{ route('admin.voters.edit', $voter->id) }}" class="text-slate-600 hover:text-indigo-600 px-1.5 py-1" title="Edit Voter">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </a>

                                <form action="{{ route('admin.voters.destroy', $voter->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDeleteVoter(this)" class="text-red-500 hover:text-red-700 px-1.5 py-1" title="Delete Voter">
                                        <i class="fa-solid fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400 text-xs">
                                <i class="fa-solid fa-users-slash text-3xl mb-2 block"></i>
                                No voters registered yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200">
            {{ $voters->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDeleteVoter(btn) {
        Swal.fire({
            title: 'Delete Voter?',
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
