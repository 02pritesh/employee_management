@extends('admin.main.main')

@section('admin-content')
    <h6>Employee Name: <strong> {{ $attendances[0]->name }}</strong></h6>
    <div class="float-right" >
        <a href="/user-attendence/{{ $attendances[0]->user_id }}" class="btn btn-success float-right m-1 ">Back</a>

</div>
    {{-- <h5 class="text-white bg-primary p-2">Attendance Report for {{ date('F', mktime(0, 0, 0, $month, 1)) }}</h5> --}}

    <div class="table-responsive mt-1">

    <table class="table table-bordered  table-striped" id="myTable">
        <thead>
                   <tr class="table-danger">
                <th>Date</th>
                <th>Attandence</th>

            </tr>
        </thead>
        <tbody>
                @php
                    $sno = 1;
                    @endphp
                @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->date }}</td>
                    <td>
                    @if($attendance->attendence_status==1)
                    present
                    @elseif($attendance->attendence_status==0)
                    absent
                    @elseif($attendance->attendence_status==2)
                    leave
                    @endif
                </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
