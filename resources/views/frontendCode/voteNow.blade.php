<x-frontend.layout_template>
    <div class="py-25 max-w-[90%] mx-auto">
        @foreach ($votenow as $i)
            <div class="bg-white shadow rounded-lg p-2 text-center w-50">
                <img src="{{ asset($i->photo) }}" class="mx-auto h-[200px] w-[200px] mb-3">

                <h2 name="fullname" class="text-xl font-semibold">{{ $i->fullname }}</h2>
                <p class="text-gray-500">{{ $i->party }}</p>
                <p><span>{{ $i->gender }}</span></p>
                <span>{{ $i->address }}</span>
                <div class="mt-4 flex justify-center gap-2">
                    <div class="flex gap-4 items-center">
                        <button
                            data-id="{{ $i->id }}"
                            class="vote-btn bg-green-500 text-white px-3 py-1 rounded">
                            + Vote Now
                        </button>
                        <span id="voteCount-{{ $i->id }}" class="font-bold">{{ $i->voteCount->count ?? 0 }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-frontend.layout_template>
