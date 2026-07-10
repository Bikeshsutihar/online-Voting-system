<x-admin.admin-layout>
    <div class="flex">

        <div>
            <x-admin.aside_navbar_layout />
        </div>

        <div class="ml-[20%] w-[100%]">
            <div class="p-9">
                <div class="mx-auto mt-10 mb-10 bg-white shadow-lg rounded-lg p-8">
                    <div>
                        <h1 class=" flex justify-center font-bold text-blue-800">Candidate List</h1>
                    </div>
                    <div class="w-full py-9">
                        <table class="w-full">
                            <thead class="">
                                <tr>
                                    <th>SN</th>
                                    <th>Candidate Name</th>
                                    <th>Phone_No</th>
                                    <th>Address</th>
                                    <th>Party_Name</th>
                                    {{-- <th>Voter-ID</th> --}}
                                    <th>Citizenship-no</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($candidateinfo as $i=>$c)

                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $c->fullname }}</td>
                                        <td>{{$c->phone}}</td>
                                        <td>{{$c->address}}</td>
                                        <td>{{ $c->party }}</td>
                                        <td>{{ $c->citizenship_no }}</td>
                                        <td>{{ $c->status }}</td>
                                    </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.admin-layout>
