<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl leading-tight  {{ $complaint->complaint_status == 'Pending' ? 'text-red-500' : 'text-orange-500' }}">
            {{ __(
                'Showing Complaint id / ' .
                    $complaint->complaint_id .
                    ' / ' .
                    $complaint->departmentname->department_name .
                    ' Department' .
                    ' / ' .
                    ' Status : ' .
                    $complaint->complaint_status,
            ) }}


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow shadow-sm sm:rounded-lg overflow-scroll">
                <div class="p-6 bg-white border-b border-gray-200 break-words">
                    @canany(['isMasterAdmin', 'isLocalAdmin', 'isDistUser', 'isDivUser'])
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
                        <form action="{{ route('complaints.update', $complaint->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-6">
                                <label for="issue_details"
                                    class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">
                                    Complaint Details</label>
                                <div class="mt-1">
                                    <textarea id="issue_details" name="issue_details" rows="3"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md font-semibold"
                                        required readonly>{{ $complaint->issuename->issue_details }}</textarea>
                                </div>
                                <label for="issue_details"
                                    class="block mt-2 mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">
                                    User Remarks</label>
                                <div class="mt-1">
                                    <textarea id="user_remarks" name="user_remarks" rows="3"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md font-semibold"
                                        required readonly>{{ $complaint->user_remarks }}</textarea>
                                </div>

                                <label for="complaint_raisedby"
                                    class="block mt-2 mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">
                                    Complaint Raised by</label>
                                <div class="mt-1">
                                    <textarea id="complaint_raisedby" name="complaint_raisedby" rows="1"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md font-semibold"
                                        required readonly>{{ $complaint->username->name . ' / ' . $complaint->username->mobile_no . ' / ' . $complaint->username->mandal }}</textarea>
                                </div>
                                <label for="captured_media"
                                    class="block mt-2 mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">
                                    Captured Media</label>
                                <a href="{{ asset('storage/images/complaints/') . '/' . $complaint->photo }}"
                                    target="__blank"><img class="object-fit h-32 w-32"
                                        src="{{ asset('storage/images/complaints/') . '/' . $complaint->photo }}" /> </a>

                                <label for="action_taken_remarks"
                                    class="block mt-2 mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">
                                    Action Taken Remarks <span class="text-lg text-red-400 font-bold">*</span></label>
                                <div class="mt-1">
                                    <textarea id="action_taken_remarks" name="action_taken_remarks" rows="3"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md font-semibold"
                                        required
                                        {{ $complaint->complaint_status == 'Pending' || $complaint->complaint_status == 'Forwarded' ? '' : 'readonly' }}>{{ $complaint->dept_user_remarks }}</textarea>
                                </div>
                                <label for="action"
                                    class="block mt-2 mb-2 text-sm font-bold text-gray-900 dark:text-gray-300">
                                    Action <span class="text-lg text-red-400 font-bold">*</span></label>
                                <Select id="complaint_status" name="complaint_status"
                                    class="mt-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500  block w-full sm:text-sm border border-gray-300 rounded-md font-semibold"
                                    required
                                    {{ ($complaint->complaint_status == 'Pending') | ($complaint->complaint_status == 'Forwarded') ? '' : 'disabled' }}>
                                    <Option value="">Please Select Action</Option>
                                    <Option value="Resolved">Issue Resolved</Option>
                                    <Option value="Forwarded">Forward To</Option>
                                    <Option value="Pending">Pending</Option>
                                </Select>
                                <Select id="division_id" name="division_id" type="text"
                                    class="mt-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500  block w-full sm:text-sm border border-gray-300 rounded-md font-semibold">
                                    <Option value="">Please Select Division</Option>

                                </Select>


                                <label class="block mt-2 mb-2 text-sm font-bold text-gray-900 dark:text-gray-300"
                                    for="file_input">Upload Action Taken Report <span
                                        class="text-lg text-red-400 font-bold">*</span></label>
                                <input
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-sm border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="action_taken_report" name="action_taken_report" type="file">


                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <a href="{{ route('complaints.index') }}"
                                        class="mr-4 inline-flex justify-center py-2 px-4 border border-transparent bg-gray-300 hover:bg-gray-400 rounded-md text-sm">Back</a>
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        {{ $complaint->complaint_status == 'Pending' || $complaint->complaint_status == 'Forwarded' ? '' : 'disabled' }}>Update
                                        Status</button>

                                </div>
                            </div>
                        </form>
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

    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#complaint_status').on('change', function() {
                    var dept_id = "{{ $complaint->dept_id }}";
                    console.log(this.value);
                    if (this.value == "Forwarded") {
                        $("#division_id").prop('disabled', false);
                        $("#action_taken_report").prop('required', false);
                        $("#division_id").html('');
                        $.ajax({
                            url: "{{ url('/fetchdivisions') }}",
                            type: "POST",
                            data: {
                                id: dept_id,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(result) {
                                $('#division_id').html('<option value="">Select Division</option>');
                                $.each(result.divisions, function(key, value) {
                                    //console.log(value)
                                    $("#division_id").append('<option value="' + value
                                        .id + '">' + value.division + '</option>');
                                });

                            }
                        });

                    } else {
                        $("#division_id").html('');
                        $("#division_id").prop('disabled', true);
                        $("#division_id").prop('required', false);
                        $("#action_taken_report").prop('required', true);
                    }

                });

            })
        </script>
    @endpush
</x-app-layout>
