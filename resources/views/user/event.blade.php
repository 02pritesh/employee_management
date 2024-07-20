@extends('user.main.main')

@section('user-content')
    <h3> Company Events</h3>
<table class="table table-bordered table-striped " id="myTable">
              <thead>
              <tr class="table-danger">


                  <th>S.No.</th>
                  <th>Time</th>
                  <th>Description</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($data as $emp)
                <tr class="table-info">
                <td >{{$i++}}</td>
                <td>{{$emp->time}}<br>

                 {{$emp->end_time}} </td>

                 <td>
                    <strong class="">
                        <h3 style="color:
                            @if($emp->type == 'Holi') red
                            @elseif($emp->type == 'Birthday') navy
                            @else black
                            @endif">
                            {{ $emp->type }}
                        </h3>
                    </strong>
                    <br>


                     <h6>{{$emp->description}}</h6></td>

                  <td> {{$emp->start_date}} </td>


              </tr>
                @endforeach

              </tbody>
              </table>

</div>














@endsection
