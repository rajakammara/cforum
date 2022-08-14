<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        </h2>
    </x-slot>

    <div class="py-12">



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow shadow-sm sm:rounded-lg overflow-scroll">
                <div class="p-6 bg-white border-b border-gray-200 break-words">
                    @canany(['isMasterAdmin', 'isLocalAdmin', 'isDistUser', 'isDivUser'])
                        {{-- You have Admin Access --}}



                        <div class="flex flex-wrap mb-2">
                            {{-- Total Complaints --}}
                            <div class="w-full md:w-1/4 xl:w-1/4 pt-3 px-3 md:pr-2">
                                <div class="bg-yellow-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i
                                                class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Total Complaints</h5>
                                            <h3 class="text-white text-3xl">{{ $dashboard_stats['totalComplaints'] }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Pending Complaints --}}
                            <div class="w-full md:w-1/4 xl:w-1/4 pt-3 px-3 md:pr-2">
                                <div class="bg-red-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i
                                                class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Pending Complaints</h5>
                                            <h3 class="text-white text-3xl">{{ $dashboard_stats['pendingComplaints'] }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Forwarded Complaints --}}
                            <div class="w-full md:w-1/4 xl:w-1/4 pt-3 px-3 md:pr-2">
                                <div class="bg-orange-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i
                                                class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Forwarded Complaints</h5>
                                            <h3 class="text-white text-3xl">{{ $dashboard_stats['forwardedComplaints'] }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Closed Complaints --}}
                            <div class="w-full md:w-1/4 xl:w-1/4 pt-3 px-3 md:pr-2">
                                <div class="bg-green-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i
                                                class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Closed Complaints</h5>
                                            <h3 class="text-white text-3xl">{{ $dashboard_stats['closedComplaints'] }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Total Departments --}}
                            <div class="w-full md:w-1/4 xl:w-1/4 pt-3 px-3 md:pr-2">
                                <div class="bg-blue-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i
                                                class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Total Departments</h5>
                                            <h3 class="text-white text-3xl">{{ $dashboard_stats['totalDepartments'] }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Total Issues --}}
                            <div class="w-full md:w-1/4 xl:w-1/4 pt-3 px-3 md:pr-2">
                                <div class="bg-emerald-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i
                                                class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Total Predefined Issues</h5>
                                            <h3 class="text-white text-3xl">{{ $dashboard_stats['totalIssues'] }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Total Dept Users --}}
                            <div class="w-full md:w-1/4 xl:w-1/4 pt-3 px-3 md:pr-2">
                                <div class="bg-gray-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i
                                                class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Total Department Users</h5>
                                            <h3 class="text-white text-3xl">{{ $dashboard_stats['totalDeptUsers'] }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Total Users --}}
                            <div class="w-full md:w-1/4 xl:w-1/4 pt-3 px-3 md:pr-2">
                                <div class="bg-indigo-600 border rounded shadow p-2">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pl-1 pr-4"><i
                                                class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                        <div class="flex-1 text-right">
                                            <h5 class="text-white">Total App Users</h5>
                                            <h3 class="text-white text-3xl">{{ $dashboard_stats['totalUsers'] }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    @endcanany

                    @can('isUser')
                        <div class="btn btn-info btn-lg">
                            You have User Access
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
