@extends('admin.main.main')

@section('admin-content')
    @if (session('success'))
        <div id ="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (Session::has('message'))
        <div id ="success-message" class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <h4 class="pl-3 pt-2 mb-5" style="background-color: #844fc1; height:40px; color:white;"> Employee Status</h4>
    <table class="table table-bordered  table-striped table-responsive" id="myTable">
        <thead>
            <tr class="table-danger">
                <th>S.No.</th>
                <th> Name </th>
                <th> Phone</th>
                <th> City </th>
                <th> Profile</th>
                <th>Technology</th>
                <th>Experience</th>
                <th>Action</th>
                <th>Salary</th>
                <th>Attandence</th>
                {{-- <th>Asign Project</th> --}}
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
                    <td>{{ $emp->technology }}</td>
                    <td>{{ $emp->experience }}</td>
                    <td> <a href="register_update/{{ $emp->id }}" class=" my-4"><i class="fa-solid fa-pen-to-square"
                                style="color:green;"></i></a>
                        <a href="delete/{{ $emp->id }}" onclick="return confirmDelete()"><i
                                class="fa-sharp fa-solid fa-trash" style="color:red;"></i></a>
                    </td>
                    <td><a href="salary/{{ $emp->id }}" class="btn btn-info ">Add <br> Salary</a><br>
                        <form action="{{ url('monthly_salary') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{ $emp->id }}" />
                            <input type="hidden" name="month" id="user_id" value="{{ $emp->month }}" />

                            <button type="submit" class="btn btn-info my-2" value="">Total<br>salary</button>
                        </form>

                    <td>
                        <form action="{{ url('user-attendence', ['user_id' => $emp->id]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-secondary my-2" value="">View <br>
                                Attandence</button>
                        </form>
                     </td>
                     {{-- <td>
                      <a href="asign-project/{{$emp->id}}" class="btn btn-info">Asign</a>
                     </td> --}}
                </tr>
            @endforeach


        </tbody>
    </table>

    <!-- </div>
    </div> -->

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete  this employee detail");
        }
    </script>
@endsection
