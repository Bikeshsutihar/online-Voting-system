<x-frontend.layout_template>
    <div class=" py-25 max-w-[90%] mx-auto ">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Candidates</h1>

            {{-- <button onclick="document.getElementById('modal').classList.remove('hidden')"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add Candidate
            </button> --}}
            <a href="{{ route('newCandidate') }}"
                class="bg-[#e9edc9] text-[#283618] px-4 py-2 rounded hover:bg-[#ccd5ae] ">regester as candidate</a>
        </div>

        <!-- Candidate Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Single Card -->
            @foreach ($show as $i )
                <div class="bg-white shadow rounded-lg p-2 text-center w-50">
                <img src="{{ asset($i->photo) }}" class="mx-auto h-[200px] w-[200px] mb-3">

                <h2 class="text-xl font-semibold">{{$i->fullname}}</h2>
                <p class="text-gray-500">{{$i->party}}</p>

                <div class="mt-4 flex justify-center gap-2">
                    <a href="#" class="bg-green-500 text-white px-3 py-1 rounded">view</a>

                </div>
            </div>
            @endforeach

            <!-- Duplicate cards dynamically -->
            {{-- <div class="bg-white shadow rounded-lg p-5 text-center">
                <img src="https://via.placeholder.com/100" class="mx-auto rounded-full mb-3">

                <h2 class="text-xl font-semibold">Jane Smith</h2>
                <p class="text-gray-500">Party: Congress</p>

                <div class="mt-4 flex justify-center gap-2">
                    <button class="bg-green-500 text-white px-3 py-1 rounded">Edit</button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                </div>
            </div> --}}

        </div>
    </div>

    <!-- Add Candidate Modal -->
    <div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-50  flex justify-center items-center">

        <div class="bg-white w-[500px] p-6 rounded-lg shadow-lg">

            <h2 class="text-xl font-bold mb-4">Add Candidate</h2>

            <form action="#" method="POST" enctype="multipart/form-data">


                <input type="text" name="name" placeholder="Candidate Name"
                    class="w-full border p-2 mb-3 rounded">

                <input type="text" name="party" placeholder="Party Name" class="w-full border p-2 mb-3 rounded">

                <input type="file" name="image" class="w-full border p-2 mb-3 rounded">

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="document.getElementById('modal').classList.add('hidden')"
                        class="px-4 py-2 bg-gray-400 text-white rounded">
                        Cancel
                    </button>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Save
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-frontend.layout_template>
