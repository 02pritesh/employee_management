@extends('admin.main.main')

@section('admin-content')
<h6 class="pl-3 mt-1">Employee Name: <strong> {{ $data[0]->name }}</strong></h6>

<div class="d-flex justify-content-between  pt-2 mb-2">
    <a href="{{url('employee')}}" class=" btn btn-success"><i class="fa-solid fa-arrow-left"></i> Back</a>

    <a href="{{url('month-attendance')}}/ {{$data[0]->user_id}}" style="color:white;" class="btn btn-info">View Attendance</a>
</div>

<div class="table-responsive">
    @if(count($data) > 0)
    <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr class="table-danger">
                <th>Attendance</th>
                <th>Date</th>
                <th>Month</th>
                <th>Year</th>
                <th>Incentive</th>
                <th>Add Incentive</th>
            </tr>
        </thead>
        <tbody>
            @php
            $sno = 1;
            @endphp
            @foreach ($data as $val)
            <tr>
                <td
                    style="color: @if ($val->attendance_status == 1) green @elseif ($val->attendance_status == 0) red @else blue @endif">
                    @if ($val->attendance_status == 1)
                    Present
                    @elseif ($val->attendance_status == 0)
                    Absent
                    @else
                    Leave
                    @endif
                </td>

                <td>{{ $val->date }}</td>
                <td>
                    {{ $val->monthName ?? 'Invalid Month' }}
                </td>
                <td>{{ $val->year }}</td>
                <td>{{ $val->incentive }}</td>

                <td>
                    <form action="{{url('incentive-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{ $val->user_id }}" />
                        <input type="hidden" name="date" id="user_id" value="{{ $val->date }}" />
                        <button type="submit" data-bs-target="#staticBackdrop" class="btn btn-secondary my-2"
                            data-bs-toggle="modal" value="">Incentive</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">
        No attendance records found for this employee.
    </div>
    @endif
</div>

{{-- Other content goes here --}}
@endsection
