@extends('layouts.admin')

@section('title', 'Election Sessions - UniVote Admin')
@section('page_heading', 'Election Sessions')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between bg-white p-4 sm:p-6 rounded-2xl border border-slate-200 shadow-sm">
        <div>
            <h2 class="text-lg font-bold font-heading text-slate-900">Manage Elections</h2>
            <p class="text-xs text-slate-500">Configure university election sessions and voting schedules.</p>
        </div>
        <a href="{{ route('admin.elections.create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-5 py-2.5 rounded-xl text-xs shadow-md shadow-blue-600/30 flex items-center">
            <i class="fa-solid fa-plus mr-1.5"></i> Create New Election
        </a>
    </div>

    <!-- Elections Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-semibold uppercase border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Schedule</th>
                        <th class="px-6 py-4">Candidates</th>
                        <th class="px-6 py-4">Total Votes</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($elections as $election)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-900 text-sm block">{{ $election->title }}</span>
                                <span class="text-[11px] text-slate-500 block truncate max-w-xs">{{ $election->description }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-slate-700 block font-medium">Start: {{ $election->start_date ? $election->start_date->format('M d, Y') : '' }}</span>
                                <span class="text-slate-500 text-[11px]">End: {{ $election->end_date ? $election->end_date->format('M d, Y') : '' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-slate-800">{{ $election->candidates_count }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-emerald-600">{{ $election->votes_count }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($election->status === 'active')
                                    <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 font-bold text-[11px] inline-flex items-center">
                                        <i class="fa-solid fa-signal mr-1 animate-pulse"></i> Active
                                    </span>
                                @elseif($election->status === 'upcoming')
                                    <span class="px-2.5 py-1 rounded-full bg-blue-100 text-blue-700 font-bold text-[11px] inline-flex items-center">
                                        <i class="fa-solid fa-clock mr-1"></i> Upcoming
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 font-bold text-[11px] inline-flex items-center">
                                        <i class="fa-solid fa-check-double mr-1"></i> Completed
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.elections.show', $election->id) }}" class="text-slate-600 hover:text-blue-600 px-1.5 py-1" title="View Results">
                                    <i class="fa-solid fa-chart-pie text-sm"></i>
                                </a>
                                <a href="{{ route('admin.elections.edit', $election->id) }}" class="text-slate-600 hover:text-indigo-600 px-1.5 py-1" title="Edit Election">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </a>

                                <form action="{{ route('admin.elections.destroy', $election->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDeleteElection(this)" class="text-red-500 hover:text-red-700 px-1.5 py-1" title="Delete Election">
                                        <i class="fa-solid fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400 text-xs">
                                <i class="fa-solid fa-box-archive text-3xl mb-2 block"></i>
                                No election sessions created yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200">
            {{ $elections->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDeleteElection(btn) {
        Swal.fire({
            title: 'Delete Election?',
            text: "All associated candidate applications and vote logs will be deleted!",
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
