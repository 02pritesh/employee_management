@extends('user.main.main')

@section('user-content')
<h4 class="card-title pt-2 pl-3 mb-4" style="background-color: #844fc1; height:40px; color:white;">Holiday</h4>

<table class="table table-bordered " id="myTable">
              <thead>
              <tr class="table-danger">


                  <th>S.No.</th>
                  <th>Day</th>
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
                <td>{{$emp->name}}</td>

                <td>
                    <strong>
                        <h3 style="color:
                            @if($emp->description == 'Independence Day' || $emp->description == 'republic day') green
                            @elseif($emp->description == 'Symbol Of Love') navy
                            @else black
                            @endif">
                            {{ $emp->description }}
                        </h3>
                    </strong>
                    <br>
                </td>

                  <td> {{$emp->date}} </td>


              </tr>
                @endforeach

              </tbody>
              </table>

</div>













@endsection
