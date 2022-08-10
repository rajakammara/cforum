<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Issues') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow shadow-sm sm:rounded-lg overflow-scroll">
                <div class="p-6 bg-white border-b border-gray-200 break-words">
                    @canany(['isMasterAdmin', 'isLocalAdmin'])

                        {{-- You have Admin Access --}}
                        <div class="">
                            <table class="table-auto ">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 border">Sl.No.</th>
                                        <th scope="col" class="py-3 px-6 border">Department Name</th>
                                        <th scope="col" class="py-3 px-6 border">Issue Details</th>
                                        <th scope="col" class="py-3 px-6 border">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($issues as $issue)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6 border">{{ $loop->iteration }}</td>
                                            <td class="py-4 px-6 border">{{ $issue->departmentname->department_name }}</td>
                                            <td class="py-4 px-6 border">{{ $issue->issue_details }}</td>
                                            <td class="py-4 px-6 border"><a href="{{ route('issues.edit', $issue->id) }}"
                                                    class="mr-4 inline-flex justify-center py-2 px-4 border border-transparent bg-blue-500 hover:bg-blue-600 rounded-md text-sm text-white">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Records to Display</td>

                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $issues->links() }}
                    @endcanany
                    @can('isDeptUser')
                        <div class="btn btn-primary btn-lg">
                            You have Department User Access
                        </div>
                    @elsecan('isUser')
                        <div class="btn btn-info btn-lg">
                            You have User Access
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
