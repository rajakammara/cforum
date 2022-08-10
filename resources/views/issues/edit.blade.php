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
                        <form action="{{ route('issues.update', $issue->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-6">
                                <label for="issue_details"
                                    class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">
                                    Issue Details</label>
                                <div class="mt-1">
                                    <textarea id="issue_details" name="issue_details" rows="3"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md font-semibold"
                                        required>{{ $issue->issue_details }}</textarea>
                                </div>
                            </div>

                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <a href="{{ route('issues.index') }}"
                                    class="mr-4 inline-flex justify-center py-2 px-4 border border-transparent bg-gray-300 hover:bg-gray-400 rounded-md text-sm">Back</a>
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>

                            </div>
                        </form>
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
