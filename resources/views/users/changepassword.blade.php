<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Change Password') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow shadow-sm sm:rounded-lg overflow-scroll">
                <div class="p-6 bg-white border-b border-gray-200 break-words">

                    @canany(['isMasterAdmin', 'isLocalAdmin', 'isDistUser', 'isDivUser'])
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
                        @if ($message = Session::get('error'))
                            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-400">
                                <span class="text-xl inline-block mr-5 align-middle">
                                    <i class="fas fa-bell"></i>
                                </span>
                                <span class="inline-block align-middle mr-8">
                                    <b class="capitalize">Error!</b> {{ $message }}
                                </span>
                                <button
                                    class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                                    onclick="closeAlert(event)">
                                    <span>×</span>

                                </button>
                            </div>
                        @endif

                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-400">
                                    <span class="text-xl inline-block mr-5 align-middle">
                                        <i class="fas fa-bell"></i>
                                    </span>
                                    <span class="inline-block align-middle mr-8">
                                        <b class="capitalize">Error!</b> {{ $error }}
                                    </span>
                                    <button
                                        class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                                        onclick="closeAlert(event)">
                                        <span>×</span>

                                    </button>
                                </div>
                            @endforeach
                        @endif

                        <div class="my-4">

                            <form method="POST" action="{{ route('users.postChangePassword') }}">
                                @csrf
                                <div class="mb-6">
                                    <div>
                                        <div class="m-4">
                                            <label for="current_password"
                                                class="block mb-2 text-sm font-semibold text-gray-900 dark:text-gray-300">Current
                                                Password</label>
                                            <input type="password" id="current-password" name="current-password"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Current Password" required>
                                        </div>
                                        <div class="m-4">
                                            <label for="new-password"
                                                class="block mb-2 text-sm font-semibold text-gray-900 dark:text-gray-300">New
                                                Password</label>
                                            <input type="password" id="new-password" name="new-password"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="New Password" required>
                                        </div>
                                        <div class="m-4">
                                            <label for="confirm-password"
                                                class="block mb-2 text-sm font-semibold text-gray-900 dark:text-gray-300">Confirm
                                                Password</label>
                                            <input type="password" id="new-password_confirmation"
                                                name="new-password_confirmation"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Confirm Password" required>
                                        </div>
                                        <div class="flex justify-center">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        </form>
                    </div>

                    {{-- You have Admin Access --}}
                @endcanany

                @can('isUser')
                    <div class="btn btn-info btn-lg">
                        Welcome
                    </div>
                @endcan
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
