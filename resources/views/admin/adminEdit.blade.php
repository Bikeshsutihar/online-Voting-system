<div>
    <div class="flex">

        <div>
            <x-admin.aside_navbar_layout />
        </div>

        <div class="ml-[20%] w-[100%]">


            <!-- Stats -->


            <div class="p-9">
                <div class="max-w-4xl mx-auto mt-10 mb-10 bg-white shadow-lg rounded-lg p-8">

                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                        Update Website Content
                    </h2>

                    <form action="{{ route("contentUpdate", $getIt->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method("patch")
                        <!-- Title -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Title
                            </label>
                            <input type="text" name="title" placeholder="Enter page title" value="{{ $getIt->title }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>

                        <!-- Slug -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Slug
                            </label>
                            <input type="text" name="slug" placeholder="about-us" value="{{ $getIt->slug }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>

                        <!-- Short Description -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Short Description
                            </label>

                            <textarea name="short_description" rows="3" placeholder="Write short description..." value="{{ $getIt->short_description }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                        </div>

                        <!-- Full Description -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Full Description
                            </label>

                            <textarea name="description" rows="6" placeholder="Write full content..." value="{"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $getIt->description }}</textarea>
                        </div>

                        <!-- Featured Image -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Featured Photo
                            </label>

                            <input type="file" name="photo" accept="image/*"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3">
                        </div>

                        <!-- Image Alt -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Image Alt Text
                            </label>

                            <input type="text" name="alt_text" placeholder="Describe the image" value="{{ $getIt->alt_text }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>




                        <!-- SEO Meta Title -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                SEO Meta Title
                            </label>

                            <input type="text" name="meta_title" placeholder="SEO Title" value="{{ $getIt->meta_title }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>

                        <!-- SEO Meta Description -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                SEO Meta Description
                            </label>

                            <textarea name="meta_description" rows="3" placeholder="SEO Description" value="{{ $getIt->meta_description }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                        </div>

                        <!-- Submit -->

                         {{-- <div class="text-right">
                            <a href="" class="bg-red-500 hover:bg-red-600     text-white px-8 py-3 rounded-lg font-semibold transition">Edit</a>
                        </div> --}}

                        <div class="text-right">
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-semibold transition">
                                update Content
                            </button>
                        </div>


                    </form>

                </div>

            </div>

        </div>


    </div>

</div>
