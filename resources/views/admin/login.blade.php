<x-admin.admin-layout>

    <div class="h-[90vh] flex items-center bg-[#d1d1d1]">
        <div class="container">
            <div class="flex justify-center">
                <div class="bg-white items-center p-8 rounded-lg shadow-lg w-full max-w-md">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
                        Admin <br>
                        <i class="fa-solid fa-user-tie"></i>
                    </h2>

                    <form action="{{ route('loginStore') }}" method="POST">

                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">
                                Email
                            </label>
                            <input type="email" id="email" name="email" placeholder="Example@gmail.com" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#e9edc9] focus:border-[#e9edc9]">
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 font-medium mb-2">
                                Password
                            </label>
                            <input type="password" id="password" name="password" placeholder="password" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#e9edc9] focus:border-[#e9edc9]">
                        </div>

                        <!-- Login Button -->
                        <div>
                            <button type="submit"
                                class="w-full bg-(--bg-color) text-[black] py-2 rounded-lg hover:bg-(--secondary-color) transition duration-300">
                                Login
                            </button>
                            <div class="flex justify-between py-3 px-5">
                                <a class="" href="{{ route("registerPage") }}">Register</a>
                                <a href="#">forgot password</a>
                                {{-- <a href="">forgot password</a> --}}
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin.admin-layout>
