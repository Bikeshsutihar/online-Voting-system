<x-frontend.layout_template>

       <!-- Main Hero Section -->
<section class="bg-[#e9edc9] min-h-screen flex items-center">
    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid md:grid-cols-2 gap-12 items-center">

            <!-- Left Content -->
            <div>

                <span
                    class="bg-[#dda15e]/20 text-[#bc6c25] px-4 py-2 rounded-full text-sm font-semibold">
                    🗳️ Secure Digital Election Platform
                </span>

                @foreach ($content as $c )

                <h1 class="mt-6 text-5xl md:text-6xl font-bold text-[#283618] leading-tight">
                    {{ $c->title }},
                    <span class="text-[#606c38]">Vote Secure</span>
                </h1>

                 <p class="mt-6 text-lg text-gray-700 leading-relaxed">
                    {{ $c->description }}
                </p>

                @endforeach

              

                <div class="mt-8 flex flex-wrap gap-4">

                    <a href="{{ route("flogin") }}"
                        class="bg-[#606c38] hover:bg-[#283618] text-white px-8 py-4 rounded-lg font-semibold transition">
                        <i class="fas fa-check-to-slot mr-2"></i>
                        Vote Now
                    </a>

                    <a href="{{ route('learnMore') }}"
                        class="border-2 border-[#606c38] text-[#606c38] hover:bg-[#606c38] hover:text-white px-8 py-4 rounded-lg font-semibold transition">
                        <i class="fas fa-circle-info mr-2"></i>
                        Learn More
                    </a>

                </div>

            </div>

            <!-- Right Content -->
            <div class="flex justify-center">

                <div class="relative">

                    <div
                        class="w-96 h-96 bg-[#606c38] rounded-full opacity-10 absolute -top-10 -left-10">
                    </div>

                    <div
                        class="bg-white shadow-2xl rounded-3xl p-10 relative mt-10 z-10">

                        <div class="text-center">

                            <i
                                class="fas fa-vote-yea text-8xl text-[#606c38] mb-6"></i>

                            <h3
                                class="text-3xl font-bold text-[#283618]">
                                Online Election
                            </h3>

                            <p class="text-gray-600 mt-3">
                                Fast • Secure • Transparent
                            </p>

                        </div>

                        <div class="mt-8 space-y-4">

                            <div
                                class="flex items-center justify-between bg-[#fefae0] p-4 rounded-lg">
                                <span class="font-medium">
                                    Registered Voters
                                </span>
                                <span
                                    class="font-bold text-[#606c38]">
                                    5,420+
                                </span>
                            </div>

                            <div
                                class="flex items-center justify-between bg-[#fefae0] p-4 rounded-lg">
                                <span class="font-medium">
                                    Candidates
                                </span>
                                <span
                                    class="font-bold text-[#606c38]">
                                    25
                                </span>
                            </div>

                            <div
                                class="flex items-center justify-between bg-[#fefae0] p-4 rounded-lg">
                                <span class="font-medium">
                                    Active Elections
                                </span>
                                <span
                                    class="font-bold text-[#606c38]">
                                    03
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Statistics -->
        <div class="grid md:grid-cols-4 gap-6 mt-20">

            <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <i class="fas fa-users text-4xl text-[#606c38] mb-3"></i>
                <h2 class="text-3xl font-bold text-[#283618]">5K+</h2>
                <p class="text-gray-600">Voters</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <i class="fas fa-user-tie text-4xl text-[#606c38] mb-3"></i>
                <h2 class="text-3xl font-bold text-[#283618]">25+</h2>
                <p class="text-gray-600">Candidates</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <i class="fas fa-check-circle text-4xl text-[#606c38] mb-3"></i>
                <h2 class="text-3xl font-bold text-[#283618]">99.9%</h2>
                <p class="text-gray-600">Accuracy</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                <i class="fas fa-shield-halved text-4xl text-[#606c38] mb-3"></i>
                <h2 class="text-3xl font-bold text-[#283618]">100%</h2>
                <p class="text-gray-600">Secure</p>
            </div>

        </div>

    </div>
</section>

</x-frontend.layout_template>
