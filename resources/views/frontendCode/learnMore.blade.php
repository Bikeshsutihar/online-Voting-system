<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Election Comission</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admincss/style.css') }}">
    <link rel="icon" href="{{ asset('images/images.jpeg') }}">
</head>

<body>
    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h1 class="text-4xl font-bold text-center text-blue-900 mb-4">
                Online Voting System
            </h1>
            <p class="text-gray-600 text-center text-lg">
                A secure and efficient web-based platform for conducting elections digitally.
            </p>
        </div>

        <!-- Introduction -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Introduction</h2>
            <p class="text-gray-700 leading-relaxed">
                The Online Voting System is a web-based application designed to conduct elections
                electronically. It allows voters to register, log in securely, view candidates,
                cast votes, and view election results. The system reduces paperwork, improves
                transparency, and provides a faster and more reliable voting process.
            </p>
        </div>

        <!-- Objectives -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Project Objectives</h2>

            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>Provide a secure online voting platform.</li>
                <li>Reduce manual work during elections.</li>
                <li>Prevent duplicate voting.</li>
                <li>Calculate election results automatically.</li>
                <li>Manage voter and candidate information efficiently.</li>
            </ul>
        </div>

        <!-- Technologies -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Technologies Used</h2>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="border p-3">Technology</th>
                            <th class="border p-3">Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border p-3">HTML</td>
                            <td class="border p-3">Web Page Structure</td>
                        </tr>
                        <tr>
                            <td class="border p-3">Tailwind CSS</td>
                            <td class="border p-3">UI Design</td>
                        </tr>
                        <tr>
                            <td class="border p-3">JavaScript</td>
                            <td class="border p-3">Client-side Functionality</td>
                        </tr>
                        <tr>
                            <td class="border p-3">Laravel</td>
                            <td class="border p-3">Backend Development</td>
                        </tr>
                        <tr>
                            <td class="border p-3">MySQL</td>
                            <td class="border p-3">Database Management</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modules -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-blue-800 mb-6">System Modules</h2>

            <div class="grid md:grid-cols-2 gap-6">

                <div class="border rounded-lg p-5">
                    <h3 class="font-bold text-lg text-blue-700 mb-2">
                        User Registration
                    </h3>
                    <p class="text-gray-600">
                        Allows voters to create accounts using personal information.
                    </p>
                </div>

                <div class="border rounded-lg p-5">
                    <h3 class="font-bold text-lg text-blue-700 mb-2">
                        User Login
                    </h3>
                    <p class="text-gray-600">
                        Secure authentication for registered voters.
                    </p>
                </div>

                <div class="border rounded-lg p-5">
                    <h3 class="font-bold text-lg text-blue-700 mb-2">
                        Candidate Management
                    </h3>
                    <p class="text-gray-600">
                        Admin can add, update, delete, and manage candidates.
                    </p>
                </div>

                <div class="border rounded-lg p-5">
                    <h3 class="font-bold text-lg text-blue-700 mb-2">
                        Voting Module
                    </h3>
                    <p class="text-gray-600">
                        Registered voters can cast their votes securely.
                    </p>
                </div>

                <div class="border rounded-lg p-5">
                    <h3 class="font-bold text-lg text-blue-700 mb-2">
                        Result Management
                    </h3>
                    <p class="text-gray-600">
                        Automatically calculates and displays election results.
                    </p>
                </div>

                <div class="border rounded-lg p-5">
                    <h3 class="font-bold text-lg text-blue-700 mb-2">
                        Admin Panel
                    </h3>
                    <p class="text-gray-600">
                        Complete control over voters, candidates, elections, and results.
                    </p>
                </div>

            </div>
        </div>

        <!-- Features -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Key Features</h2>

            <div class="grid md:grid-cols-3 gap-4">
                <div class="bg-green-50 p-4 rounded-lg">
                    ✅ Secure Login System
                </div>

                <div class="bg-green-50 p-4 rounded-lg">
                    ✅ Candidate Management
                </div>

                <div class="bg-green-50 p-4 rounded-lg">
                    ✅ One Vote Per User
                </div>

                <div class="bg-green-50 p-4 rounded-lg">
                    ✅ Real-Time Results
                </div>

                <div class="bg-green-50 p-4 rounded-lg">
                    ✅ Responsive Design
                </div>

                <div class="bg-green-50 p-4 rounded-lg">
                    ✅ Database Storage
                </div>
            </div>
        </div>

        <!-- Advantages -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Advantages</h2>

            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>Reduces paperwork and operational cost.</li>
                <li>Provides quick and accurate results.</li>
                <li>Improves election transparency.</li>
                <li>Accessible from any location with internet.</li>
                <li>Minimizes human errors.</li>
            </ul>
        </div>

        <!-- Future Scope -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-blue-800 mb-4">Future Enhancements</h2>

            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>Two-Factor Authentication (2FA)</li>
                <li>Email Verification</li>
                <li>SMS OTP Verification</li>
                <li>Mobile Application</li>
                <li>Biometric Authentication</li>
                <li>Graphical Result Analysis</li>
            </ul>
        </div>

        <!-- Conclusion -->
        <div class="bg-blue-900 text-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-4">Conclusion</h2>

            <p class="leading-relaxed">
                The Online Voting System is a secure, efficient, and user-friendly
                platform that digitizes the election process. It simplifies voter
                registration, candidate management, voting, and result calculation
                while ensuring transparency and accuracy in elections.
            </p>
        </div>

    </div>


</body>

</html>
