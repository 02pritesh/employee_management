@extends('admin.main.main')

@section('admin-content')
@if (Session::has('success'))
<div  id ="success-message" class="alert alert-success" role="alert">
       {{Session::get('success')}}
   </div>
      @endif

  <h4 class="card-title pt-2 pl-3 mb-5" style="background-color: #844fc1; height:40px; color:white;">Leave Application</h4>
        <table class="table table-bordered  table-striped" id="myTable">
        <thead>
              <tr class="table-danger">
                  <th>S.No.</th>
                  <th>  Name </th>
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
                @foreach ($data as $leave)
                <tr class="table-info">
                <td>{{$i++}}</td>
                <td >{{$leave->name}}</td>
                <td>{{$leave->reason}}</td>
                <td>{{ $leave->subject }}</td>
                 <td> {{$leave->start_date}} and
                {{$leave->end_date}} </td>
                <td>
                @if ($leave->status == 'Approved')
                <a href="update/{{ $leave->id}}" data-bs-target="#updateModal{{$leave->id}}"data-bs-toggle="modal" class="btn btn-success">{{$leave->status}}</a>
                @elseif ($leave->status == 'reject' || $leave->status=='pending')
                <a href="update/{{ $leave->id}}" data-bs-target="#updateModal{{$leave->id}}" data-bs-toggle="modal" class="btn btn-danger">{{$leave->status}}</a>
                @endif
              </td>

              </tr>
                @endforeach

              </tbody>
              </table>


@foreach ($data as $leave)

<div class="modal fade" id="updateModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($leave->status !== 'Approved')
                    <form method="POST" action="{{url('update')}}">
                        @csrf
                        <h6>Do you want to change the status?</h6>
                        <input type="hidden" name="start_date" value="{{ $leave->start_date}}">
                        <input type="hidden" name="user_id" value="{{$leave->user_id}}">

                        <input type="hidden" class="form-control" name="status" value="{{ $leave->status }}" readonly>

                        <input type="checkbox" id="approveCheckbox" name="status" value="Approve" class="p-1"> Approve
                        <input type="checkbox" id="rejectCheckbox" name="status" value="reject" class="p-3 m-2"> Reject <br>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                @else
                    <p>Status is already approved.</p>
                @endif
            </div>
        </div>
    </div>
</div>


@endforeach





@endsection
