@extends('user.main.main')

@section('user-content')
<body>

    <h5  class=" pl-2 pt-3"style="background-color:skyblue; height:50px;">Attendence Report for {{ date('F', mktime(0, 0, 0, $month, 1)) }}</h5>
    <table class="table table-bordered  table-striped" id="myTable">
        <thead>
                   <tr class="table-danger">
                <th>Date</th>
                <th>Attandence</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->date }}</td>
                    <td>
                    @if($attendance->attendence_status==1)
                    present
                    @elseif($attendance->attendence_status==0)
                    absent
                    @endif
                </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
