<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('isAdmin')
                        <div class="btn btn-success btn-lg">
                            {{-- You have Admin Access --}}

                            <table class="table-auto">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 border">Sl.No.</th>
                                        <th scope="col" class="py-3 px-6 border">Userid</th>
                                        <th scope="col" class="py-3 px-6 border">Deptid</th>
                                        <th scope="col" class="py-3 px-6 border">Issueid</th>
                                        <th scope="col" class="py-3 px-6 border">User Remarks</th>
                                        <th scope="col" class="py-3 px-6 border">Complaint Status</th>
                                        <th scope="col" class="py-3 px-6 border">Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($complaints as $complaint)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6 border">{{ $loop->iteration }}</td>
                                            <td class="py-4 px-6 border">{{ $complaint->username->name }}</td>
                                            <td class="py-4 px-6 border">{{ $complaint->departmentname->department_name }}
                                            </td>
                                            <td class="py-4 px-6 border">{{ $complaint->issuename->issue_details }}</td>
                                            <td class="py-4 px-6 border">{{ $complaint->user_remarks }}</td>
                                            <td class="py-4 px-6 border">{{ $complaint->complaint_status }}</td>
                                            {{-- <td class="py-4 px-6 border">{{ $complaint->photo }}</td> --}}
                                            <td class="py-4 px-6 border">
                                                <a href="{{ asset('storage/images/complaints/') . '/' . $complaint->photo }}"
                                                    target="__blank"><img class="object-fit h-10 w-10"
                                                        src="{{ asset('storage/images/complaints/') . '/' . $complaint->photo }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Records to Display</td>

                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $complaints->links() }}
                        </div>
                    @elsecan('isManager')
                        <div class="btn btn-primary btn-lg">
                            You have Manager Access
                        </div>
                    @else
                        <div class="btn btn-info btn-lg">
                            You have User Access
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
