<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">

    <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg p-8">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-700">
                Candidate Registration
            </h1>
            <p class="text-gray-500 mt-2">
                Fill in the details below to register as a candidate.
            </p>
        </div>

        <form action="{{ route("candidateStore") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Full Name -->
                <div>
                    <label class="block font-medium mb-2" for="fullname">Full Name</label>
                    <input
                        type="text"
                        name="fullname"
                        id="fullname"
                        placeholder="Enter full name"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @error('fullname')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-medium mb-2">Email</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="example@gmail.com"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @error('email')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block font-medium mb-2">Phone Number</label>
                    <input
                        type="tel"
                        name="phone"
                        placeholder="98XXXXXXXX"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @error('phone')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Citizenship -->
                <div>
                    <label class="block font-medium mb-2">Citizenship Number</label>
                    <input
                        type="text"
                        name="citizenship_no"
                        placeholder="Enter citizenship number"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @error('citizenship_no')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block font-medium mb-2">Date of Birth</label>
                    <input
                        type="date"
                        name="dob"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @error('dob')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Gender -->
                <div>
                    <label class="block font-medium mb-2">Gender</label>

                    <select
                        name="gender"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>

                    </select>
                    @error('gender')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Political Party -->
                <div>
                    <label class="block font-medium mb-2">Political Party</label>
                    <input
                        type="text"
                        name="party"
                        placeholder="Enter party name"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @error('party')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Election Position -->
                <div>
                    <label class="block font-medium mb-2">Election Position</label>

                    <select
                        name="position"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        <option>Select Position</option>
                        <option value="President">President</option>
                        <option value="Vice president">Vice President</option>
                        <option value="Secretary">Secretary</option>
                        <option value="Treasurer">Treasurer</option>

                    </select>
                    @error('position')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="block font-medium mb-2">Address</label>

                    <textarea
                        name="address"
                        rows="3"
                        placeholder="Enter your address"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                        @error('address')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Candidate Manifesto -->
                <div class="md:col-span-2">
                    <label class="block font-medium mb-2">Manifesto / About Yourself</label>

                    <textarea
                        name="manifesto"
                        rows="5"
                        placeholder="Write your manifesto..."
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                </div>

                <!-- Candidate Photo -->
                <div>
                    <label class="block font-medium mb-2">Upload Photo</label>

                    <input
                        type="file"
                        name="photo"
                        class="w-full border rounded-lg px-4 py-2">
                        @error('photo')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Party Logo -->
                <div>
                    <label class="block font-medium mb-2">Party Logo</label>

                    <input
                        type="file"
                        name="party_logo"
                        class="w-full border rounded-lg px-4 py-2">
                        @error('party_logo')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block font-medium mb-2">Password</label>

                    <input
                        type="password"
                        name="password"
                        placeholder="********"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @error('password')
                        <span class="text-red-600">{{ $message }}</span>

                        @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block font-medium mb-2">Confirm Password</label>

                    <input
                        type="password"
                        name="confirm_password"
                        placeholder="********"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @error('confirm_password')
                        <span class="text-red-600"> confirm password doesnot match {{ $message }}</span>

                        @enderror
                </div>

            </div>

            <div class="mt-8">
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">

                    Register Candidate

                </button>
            </div>

        </form>

    </div>

</body>
</html>
