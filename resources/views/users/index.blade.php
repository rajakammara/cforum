<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow shadow-sm sm:rounded-lg overflow-scroll">
                <div class="p-6 bg-white border-b border-gray-200 break-words">
                    @canany(['isMasterAdmin', 'isLocalAdmin'])
                        <div class="my-4">
                            <a href="{{ route('users.create') }}"
                                class="mr-4 inline-flex justify-center py-2 px-4 border border-transparent bg-green-500 hover:bg-green-600 rounded-md text-sm text-white">Create
                                New User</a>
                        </div>

                        {{-- You have Admin Access --}}
                        <div class="">
                            <table class="table-auto ">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 border">Sl.No.</th>
                                        <th scope="col" class="py-3 px-6 border">User Name</th>
                                        <th scope="col" class="py-3 px-6 border">Mobile</th>
                                        <th scope="col" class="py-3 px-6 border">User Type</th>
                                        <th scope="col" class="py-3 px-6 border">Department</th>
                                        <th scope="col" class="py-3 px-6 border">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6 border">{{ $loop->iteration }}</td>
                                            <td class="py-4 px-6 border">{{ $user->name }}</td>
                                            <td class="py-4 px-6 border">{{ $user->mobile_no }}</td>
                                            <td class="py-4 px-6 border">{{ $user->role }}</td>
                                            <td class="py-4 px-6 border">
                                                @if ($user->role == 'local_admin')
                                                    {{ $user->department->department_name ?? 'Admin' }}
                                                @else
                                                    {{ $user->department->department_name ?? 'App User' }}
                                                @endif

                                            </td>
                                            <td class="py-4 px-6 border">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="mr-4 inline-flex justify-center py-2 px-4 border border-transparent bg-blue-500 hover:bg-blue-600 rounded-md text-sm text-white">Edit</a>
                                                <a href="{{ route('users.reset', $user->id) }}"
                                                    class="mr-4 inline-flex justify-center py-2 px-4 border border-transparent bg-yellow-500 hover:bg-yellow-600 rounded-md text-sm text-white">Reset
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
                        </div>
                        {{ $users->links() }}
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
