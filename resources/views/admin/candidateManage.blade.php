<x-admin.admin-layout>
    <div class="flex">

        <div>
            <x-admin.aside_navbar_layout />
        </div>

        <div class="ml-[20%] w-[100%]">
            <div class="p-9">
                <div class="mx-auto mt-10 mb-10 bg-white shadow-lg rounded-lg p-8">
                    <div>
                        <h1 class=" flex justify-center font-bold text-blue-800">Candidate List</h1>
                    </div>
                    <div class="w-full py-9">
                        <div class="overflow-x-auto bg-white rounded-xl shadow-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">

                                <!-- Table Header -->
                                <thead class="bg-indigo-600 text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">SN</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Candidate Name</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Phone No</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Address</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Party Name</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Citizenship No</th>
                                        <th class="px-6 py-3 text-center text-sm font-semibold">Status</th>
                                        <th class="px-6 py-3 text-center text-sm font-semibold">Action</th>
                                    </tr>
                                </thead>

                                <!-- Table Body -->
                                <tbody class="divide-y divide-gray-200 bg-white">

                                    @foreach ($candidateinfo as $i => $c)
                                        <tr class="hover:bg-gray-50 transition duration-200">

                                            <td class="px-6 py-4">{{ ++$i }}</td>

                                            <td class="px-6 py-4 font-medium text-gray-800">
                                                {{ $c->fullname }}
                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $c->phone }}
                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $c->address }}
                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $c->party }}
                                            </td>

                                            <td class="px-6 py-4">
                                                {{ $c->citizenship_no }}
                                            </td>

                                            <td class="px-6 py-4 text-center">
                                                @if ($c->status == 'Active')
                                                    <span
                                                        class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                                        Active
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">
                                                        Inactive
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="px-6 py-4">
                                                <div class="flex justify-center gap-2">

                                                    <!-- View -->
                                                    <a href="#"
                                                        class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm">
                                                        View
                                                    </a>

                                                    <!-- Edit -->
                                                    <a href="#"
                                                        class="px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg text-sm">
                                                        <i class="fa-solid fa-check"></i>
                                                    </a>

                                                    <a href="#"
                                                        class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm">
                                                       <i class="fa-solid fa-xmark"></i>
                                                    </a>

                                                    <!-- Delete -->
                                                    {{-- <button
                                                        class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm">
                                                        Delete
                                                    </button> --}}

                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.admin-layout>
