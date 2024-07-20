@extends('admin.main.main')
<!-- Add these scripts to your HTML -->
<!-- Add these scripts to your HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


@section('admin-content')
    @if (session('success'))
        <div  id ="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- <div id="messageContainer"></div> --}}

    <h4 class="pl-3 pt-2 mb-5" style="background-color: #844fc1; height:40px; color:white;"> Employee List Table</h4>
    <table class="table table-bordered  table-striped table-responsive" id="myTable">

        <thead>
            <tr class="table-danger">
                <th>S.No.</th>
                <th> Name </th>
                <th> Phone No</th>
                <th> City </th>
                <th> Profile</th>
                <th> Technology</th>
                <th> Experience</th>
                <th>Action</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $emp)
                <tr class="table-info">
                    <td>{{ $i++ }}</td>
                    <td>{{ ucwords($emp->name) }}</td>
                    <td>{{ $emp->phone }}</td>
                    <td> {{ $emp->city }} </td>
                    <td> {{ $emp->profile }} </td>
                    <td>{{$emp->technology}}</td>
                    <td>{{$emp->experience}}</td>
                    <td> <a href="register_update/{{ $emp->id }}" class=" my-2"><i class="fa-solid fa-pen-to-square"
                                style="color:green;"></i></a>
                        <a href="delete/{{ $emp->id }}" class="" onclick="return confirmDelete()"><i
                                class="fa-sharp fa-solid fa-trash" style="color:red;"></i></a>
                    </td>
                    <td>
                        <form action="{{ url('status/') . '/' . $emp->id }}" method="post" id="statusForm">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            @if ($emp->login_status === 'deactivate')
                                <button type="button" class="btn btn-success loginactive"
                                    data-user-id="{{ $emp->id }}"
                                    onclick="toggleLoginStatus('{{ $emp->id }}', 'activate')">
                                    activate
                                </button>
                            @else
                                <button type="button" class="btn btn-danger loginactive"
                                    data-user-id="{{ $emp->id }}"
                                    onclick="toggleLoginStatus('{{ $emp->id }}', 'deactivate')">
                                    deactivate
                                </button>
                            @endif


                        </form>
                    </td>




                </tr>
            @endforeach


        </tbody>
    </table>



    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete employee");
        }
    </script>

<script>
    function toggleLoginStatus(eid, action) {
        var confirmationMessage = action === 'deactivate' ? "Do you want to Deactivate this employee?" : "Do you want to activate this employee?";

        if (confirm(confirmationMessage)) {
            $.ajax({
                url: '{{ url('/status') }}' + '/' + eid,
                type: 'GET', // Use POST to modify data
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        var button = $("button[data-user-id='" + eid + "']");
                        var newText = action === 'deactivate' ? 'activate' : 'deactivate';
                        var newClass = action === 'deactivate' ? 'btn-success' : 'btn-danger';

                        button.text(newText);
                        button.removeClass('btn-success btn-danger').addClass(newClass);
                    } else {
                        console.log('An error occurred:', response.error);
                        // Handle error conditions here
                    }
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = response.responseJSON.errors;
                        // Handle validation errors if needed
                    } else {
                        // Handle other error conditions
                    }
                }
            });
        }
    }
</script>
@endsection
