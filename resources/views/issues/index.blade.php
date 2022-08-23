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
                        <div class="my-4">
                            <a href="{{ route('issues.create') }}"
                                class="mr-4 inline-flex justify-center py-2 px-4 border border-transparent bg-green-500 hover:bg-green-600 rounded-md text-sm text-white">Create
                                New Issue</a>
                        </div>

                        {{-- alert --}}
                        @if ($message = Session::get('success'))
                            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-400">
                                <span class="text-xl inline-block mr-5 align-middle">
                                    <i class="fas fa-bell"></i>
                                </span>
                                <span class="inline-block align-middle mr-8">
                                    <b class="capitalize">Success!</b> {{ $message }}
                                </span>
                                <button
                                    class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                                    onclick="closeAlert(event)">
                                    <span>×</span>

                                </button>
                            </div>
                        @endif

                        {{-- .alert --}}
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
                                            <td class="py-4 px-6 border">
                                                <div class="flex">
                                                    <a href="{{ route('issues.edit', $issue->id) }}"
                                                        class="mr-2 inline-flex justify-center py-2 px-4 border border-transparent bg-blue-500 hover:bg-blue-600 rounded-md text-sm text-white">Edit</a>
                                                    <form method="POST" action="{{ route('issues.destroy', $issue->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Your are Deleting Issue! Are you sure?')"
                                                            class="mr-2 inline-flex justify-center py-2 px-4 border border-transparent bg-red-500 hover:bg-red-600 rounded-md text-sm text-white">Delete</button>
                                                    </form>
                                                </div>

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
