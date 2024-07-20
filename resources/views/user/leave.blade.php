@extends('user.main.main')

@section('user-content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert" id="success-message">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('fail'))
    <div class="alert alert-danger" role="alert" id="error-message">
        {{ Session::get('fail') }}
    </div>
@endif
    <h4 class="card-title pt-2 pl-3 mb-4" style="background-color: #844fc1; height:40px; color:white;">Leave Application</h4>

    <div class="card mb-3" style="background:#97c4dd;">
        <div class="card-body">
            <h2 class="card-title text-center">Leave Application</h2>
            <form action="{{ url('leave_page') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-3 ">
                    <input type="hidden" class="form-control form-control-user" id="exampleInputEmail"
                        style="border: 0.5px solid;"aria-describedby="emailHelp" placeholder="" name="user_id"
                        value="">
                </div>
                <div class="row">
                    <div class=" col-lg-10">
                        <div class="form-group my-3 ">
                            <label> Employee Name </label>
                            <input type="text" class="form-control form-control-user" id="exampleInputname"
                                style="border: 0.5px solid;" placeholder="Enter name here" name="name"
                                value="{{ $name }}" disabled>
                        </div>
                        <span style="color:red;"> @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class=" col-lg-10">
                        <div class="form-group my-3">

                            <label>Subject</label>
                            <input type="text" class="form-control form-control-user"               id="exampleInputname"
                                style="border: 0.5px solid;" placeholder="" name="subject" value="" >
                        </div>
                        <span style="color:red;"> @error('subject')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="col-lg-10">
                        <div class="form-group my-3 ">
                            <label> Reason</label>
                            <input type="text" class="form-control form-control-user" id="exampleInputname"
                                style="border: 0.5px solid;" placeholder="" name="reason" value="" >
                        </div>
                        <span style="color:red;"> @error('reason')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="row">
                        <div class=" col-lg-5">
                            <div class="form-group my-3 ">
                                <label>Date Start</label>
                                <input type="date" id="datemax" id="exampleInputname" class="form-control"
                                    name="start_date">
                            </div>
                            <span style="color:red;"> @error('start_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class=" col-lg-5">
                            <div class="form-group my-3">
                                <label>End Date</label>
                                <input type="date" id="datemax" id="exampleInputname"class="form-control"
                                    name="end_date">

                                    {{-- required min="{{ date('Y-m-d') }} --}}
                            </div>
                            <span style="color:red;"> @error('end_date')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>

                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>

    <table class="table table-bordered mt-3 table-striped" id="myTable">
        <thead>
            <tr class="table-danger">
                <th>S.No.</th>
                <th>Subject</th>
                <th> Reason</th>
                <th> Date</th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $emp)
                <tr class="table-info">
                    <td>{{ $i++ }}</td>
                    <td>{{ $emp->reason }}</td>
                    <td>{{ $emp->subject }}</td>
                    <td> {{ $emp->start_date }} and
                        {{ $emp->end_date }} </td>
                    <td>
                        @if ($emp->status == 'approve')
                            <a href=""data-bs-target=""data-bs-toggle="modal"
                                class="btn btn-success">{{ $emp->status }}</a>
                        @elseif ($emp->status == 'reject' || $emp->status == 'pending')
                            <a href="" data-bs-target="" data-bs-toggle="modal"
                                class="btn btn-danger">{{ $emp->status }}</a>
                        @endif
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    </div>

    <script>
        setTimeout(() => {
           $('#success-message').fadeOut('fast') 
        }, 3000);

        setTimeout(() => {
           $('#error-message').fadeOut('fast') 
        }, 3000);
    </script>
@endsection
