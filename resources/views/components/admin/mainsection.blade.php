
<div>
    <div class="flex">

        <div>
            <x-admin.aside_navbar_layout />
        </div>

        <div class="ml-[20%] w-[100%]">

            <!-- Stats -->
            <div class="mt-[90px] grid md:grid-cols-4 gap-6 p-6">

                <div class="bg-white shadow rounded-lg p-6">
                    <i class="fas fa-users text-4xl text-blue-600"></i>
                    <h3 class="text-xl font-bold mt-3">500</h3>
                    <p>Total Voters</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <i class="fas fa-user-tie text-4xl text-green-600"></i>
                    <h3 class="text-xl font-bold mt-3">12</h3>
                    <p>Candidates</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <i class="fas fa-calendar-check text-4xl text-yellow-500"></i>
                    <h3 class="text-xl font-bold mt-3">3</h3>
                    <p>Active Elections</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <i class="fas fa-chart-line text-4xl text-red-500"></i>
                    <h3 class="text-xl font-bold mt-3">350</h3>
                    <p>Votes Cast</p>
                </div>

            </div>

            <!-- Management Sections -->
            <div class="px-6 pb-8">

                <!-- User Management -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="bg-gray-100 px-5 py-3 border-b">
                        <h3 class="font-bold text-lg">
                            Voter Management
                        </h3>
                    </div>

                    <div class="grid md:grid-cols-4 gap-6 p-6">

                        <div class="text-center">
                            <i class="fas fa-user-plus text-4xl text-blue-600"></i>
                            <p class="mt-2">Add Voter</p>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-list text-4xl text-green-600"></i>
                            <p class="mt-2">View Voters</p>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-user-edit text-4xl text-yellow-500"></i>
                            <p class="mt-2">Edit Voter</p>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-trash text-4xl text-red-600"></i>
                            <p class="mt-2">Delete Voter</p>
                        </div>

                    </div>
                </div>

                <!-- Candidate Management -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="bg-gray-100 px-5 py-3 border-b">
                        <h3 class="font-bold text-lg">
                            Candidate Management
                        </h3>
                    </div>

                    <div class="grid md:grid-cols-4 gap-6 p-6">

                        <div class="text-center">
                            <i class="fas fa-user-plus text-4xl text-blue-600"></i>
                            <p>Add Candidate</p>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-users text-4xl text-green-600"></i>
                            <p>Candidate List</p>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-user-pen text-4xl text-yellow-500"></i>
                            <p>Edit Candidate</p>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-user-minus text-4xl text-red-600"></i>
                            <p>Remove Candidate</p>
                        </div>

                    </div>
                </div>

                <!-- Election Tools -->
                <div class="bg-white rounded-lg shadow">
                    <div class="bg-gray-100 px-5 py-3 border-b">
                        <h3 class="font-bold text-lg">
                            Election Tools
                        </h3>
                    </div>

                    <div class="grid md:grid-cols-4 gap-6 p-6">

                        <div class="text-center">
                            <i class="fas fa-calendar-plus text-4xl text-indigo-600"></i>
                            <p>Create Election</p>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-play-circle text-4xl text-green-600"></i>
                            <p>Start Election</p>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-square-poll-vertical text-4xl text-yellow-500"></i>
                            <p>Live Results</p>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-file-export text-4xl text-red-600"></i>
                            <p>Generate Report</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
