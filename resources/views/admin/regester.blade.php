<x-admin.admin-layout>
    <div class="flex items-center h-[100vh]">
        <div class="container">
            <div class="flex justify-center">

                <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">

                    <div>
                        <a href="{{ route("adminLogin") }}"><i class="fa-solid fa-arrow-left"></i></a>
                    </div>

                    <h2 class="text-3xl font-bold text-center mb-6">
                        Register
                    </h2>

                    <form action="{{ route("adminstore") }}" method="POST" class="space-y-4">
                        @csrf

                        <!-- Full Name -->
                        <div>
                            <label class="block mb-2 font-medium text-gray-700">
                                Full Name
                            </label>
                            <input type="text" name="fullname" placeholder="Enter your full name" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#e9edc9] focus:border-[#e9edc9]">
                                
                         </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block mb-2 font-medium text-gray-700">
                                Phone Number
                            </label>
                            <input type="tel" name="phonenumber" placeholder="Enter your phone number" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#e9edc9] focus:border-[#e9edc9]">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block mb-2 font-medium text-gray-700">
                                Email
                            </label>
                            <input type="email" name="email" placeholder="Enter your email" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#e9edc9] focus:border-[#e9edc9]">
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block mb-2 font-medium text-gray-700">
                                Password
                            </label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#e9edc9] focus:border-[#e9edc9]">
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block mb-2 font-medium text-gray-700">
                                Confirm Password
                            </label>
                           <div class="flex ">
                             <input type="password" id="c_password" name="conform_password" placeholder="Confirm your password" required
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#e9edc9] focus:border-[#e9edc9]">


                           </div>

                           {{-- <div>
                            <a href="#" id="see"><i class="fa-regular fa-eye-slash"></i></a>
                           </div> --}}
                        </div>

                        <!-- Register Button -->
                        <button type="submit"
                            class="w-full py-3 rounded-lg font-semibold hover:bg-(--secondary-color) transition duration-300 text-gray-800 bg-[#e9edc9] hover:opacity-90 transition duration-300">
                            Register
                        </button>


                    </form>

                </div>

            </div>
        </div>
    </div>
</x-admin.admin-layout>
