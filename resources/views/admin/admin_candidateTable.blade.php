<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate List</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body class="bg-gray-100">

<div class="max-w-7xl mx-auto p-8">

    <h1 class="text-3xl font-bold text-blue-700 mb-6">
        Candidate Registration List
    </h1>

    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">

        <table class="min-w-full border-collapse">

            <thead class="bg-blue-600 text-white">

                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Photo</th>
                    <th class="px-4 py-3 text-left">Full Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Phone</th>
                    <th class="px-4 py-3 text-left">Party</th>
                    <th class="px-4 py-3 text-left">Position</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>

            </thead>

            <tbody class="divide-y divide-gray-200">

                <!-- Row 1 -->
                <tr class="hover:bg-gray-50">

                    <td class="px-4 py-3">1</td>

                    <td class="px-4 py-3">
                        <img src="https://via.placeholder.com/60"
                             class="w-14 h-14 rounded-full object-cover">
                    </td>

                    <td class="px-4 py-3 font-semibold">
                        Bikesh Sutihar
                    </td>

                    <td class="px-4 py-3">
                        bikesh@gmail.com
                    </td>

                    <td class="px-4 py-3">
                        9800000000
                    </td>

                    <td class="px-4 py-3">
                        ABC Party
                    </td>

                    <td class="px-4 py-3">
                        President
                    </td>

                    <td class="px-4 py-3">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                            Pending
                        </span>
                    </td>

                    <td class="px-4 py-3">

                        <div class="flex justify-center gap-3">

                            <!-- Approve -->
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white w-10 h-10 rounded-full">

                                <i class="fas fa-check"></i>

                            </button>

                            <!-- Reject -->
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white w-10 h-10 rounded-full">

                                <i class="fas fa-times"></i>

                            </button>

                        </div>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
