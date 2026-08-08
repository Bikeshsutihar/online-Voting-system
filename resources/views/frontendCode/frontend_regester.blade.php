<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Election Comission</title>
    @include('sweetalert2::index')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admincss/style.css') }}">
    <link rel="icon" href="{{ asset('images/images.jpeg') }}">
</head>

<body class="bg-[#E8EBCF] min-h-screen">

    <div class="w-[80%] mx-[10%] min-h-screen flex items-center justify-center">

        <div class="w-[60%] bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-[#6B7638] text-white py-8 text-center">
                <div class="w-20 h-20 mx-auto rounded-full bg-[#7D8848] flex items-center justify-center">
                    <i class="fa-solid fa-user-plus text-4xl"></i>
                </div>

                <h2 class="text-3xl font-bold mt-4">
                    Voter Registration
                </h2>

                <p class="text-green-100 mt-2">
                    Secure Digital Election Platform
                </p>
            </div>

            <!-- Form -->
            <form class="p-8 space-y-5" action="{{ route('fregister') }}" method="post">
                @csrf

                <div>
                    <label class="block font-semibold text-[#1F2A1F] mb-2" for="fullname">
                        Full Name
                    </label>

                    <input type="text" name="fullname"
                        class="w-full px-4 py-3 border border-[#D8DDBA] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#6B7638]"
                        placeholder="Enter full name">
                        @error('fullname')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-4">

                    <div>
                        <label class="block font-semibold text-[#1F2A1F] mb-2">
                            Email
                        </label>

                        <input type="email" name="email"
                            class="w-full px-4 py-3 border border-[#D8DDBA] rounded-xl focus:ring-2 focus:ring-[#6B7638]"
                            placeholder="Example@gmail.com">
                              @error('email')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                    </div>

                    <div>
                        <label class="block font-semibold text-[#1F2A1F] mb-2">
                            Phone Number
                        </label>

                        <input type="tel" name="phone_number"
                            class="w-full px-4 py-3 border border-[#D8DDBA] rounded-xl focus:ring-2 focus:ring-[#6B7638]"
                            placeholder="+977 98XXXXXXXX">
                              @error('phone_number')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                    </div>

                </div>

                <div class=" grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold text-[#1F2A1F] mb-2">
                            Voter ID
                        </label>

                        <input type="text" name="voter_id"
                            class="w-full px-4 py-3 border border-[#D8DDBA] rounded-xl focus:ring-2 focus:ring-[#6B7638]"
                            placeholder="Enter Your Voter ID">
                              @error('voter_id')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                    </div>

                    <div>
                        <label class="block font-semibold text-[#1F2A1F] mb-2" for="citizenship_no">
                            Citizenship Number
                        </label>

                        <input type="text" name="citizenship_no"
                            class="w-full px-4 py-3 border border-[#D8DDBA] rounded-xl focus:ring-2 focus:ring-[#6B7638]"
                            placeholder="Citizenship Number">
                              @error('citizenship_no')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-1">

                    <div>
                        <label class="block font-semibold text-[#1F2A1F] mb-2">
                            Gender
                        </label>

                        <select name="gender"
                            class="w-full px-4 py-3 border border-[#D8DDBA] rounded-xl focus:ring-2 focus:ring-[#6B7638]">
                            <option>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                          @error('gender')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                    </div>

                    <div>
                        {{-- <label class="block font-semibold text-[#1F2A1F] mb-2">
                            Register As
                        </label> --}}

                        {{-- <select
                            class="w-full px-4 py-3 border border-[#D8DDBA] rounded-xl focus:ring-2 focus:ring-[#6B7638]">
                            <option>Select Role</option>
                            <option>Voter</option>
                            <option>Candidate</option>
                        </select> --}}
                    </div>

                </div>

                 <div class="grid md:grid-cols-2 gap-4">

                    <div>
                        <label class="block font-semibold text-[#1F2A1F] mb-2">
                            password
                        </label>

                        <input type="password" name="password"
                            class="w-full px-4 py-3 border border-[#D8DDBA] rounded-xl focus:ring-2 focus:ring-[#6B7638]"
                            placeholder="password">
                              @error('password')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                    </div>

                    <div>
                        <label class="block font-semibold text-[#1F2A1F] mb-2">
                            confirm password
                        </label>

                        <input type="password" name="confirm_password"
                            class="w-full px-4 py-3 border border-[#D8DDBA] rounded-xl focus:ring-2 focus:ring-[#6B7638]"
                            placeholder="confirm password">

                    </div>

                </div>

                <button type="submit"
                    class="w-full py-3 rounded-xl bg-[#6B7638] hover:bg-[#55602D] text-white font-semibold transition">
                    <i class="fa-solid fa-user-plus mr-2"></i>
                    Register Account
                </button>

                <p class="text-center text-[#5B6570]">
                    Already have an account?
                    <a href="{{ route('flogin') }}" class="text-[#D89A52] font-semibold hover:text-[#C57D29]">
                        Login
                    </a>
                </p>

            </form>

        </div>

    </div>

</body>

</html>
