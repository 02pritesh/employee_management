@extends('admin.main.main')

@section('admin-content')
    <h4 class="card-title pt-2 pl-3 mb-4" style="background-color: #844fc1; height:40px; color:white;">Event Organization</h4>
    <div class="row justify-content-center">
        <div class="  grid-margin stretch-card">
            <div class="card" style="background:#97c4dd;">
                <div class="card-body">
                    <h3 class="card-title text-center">Event Page</h3>
                    @if (Session::has('success'))
                        <div id ="success-message" class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    

                    @if (Session::has('fail'))
                        <div id ="error-message" class="alert alert-danger" role="alert">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    <form action="{{ url('events') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Type</label>
                            <input type="text" class="form-control" style="border: 0.5px solid; "
                                id="exampleInputUsername1" placeholder="event type" name="type">
                            <span style="color:red;"> @error('type')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea type="text" class="form-control"style="border: 0.5px solid;" id="exampleInputEmail1" name="description"
                                ></textarea>
                                <span style="color:red;"> @error('description')
                                  {{ $message }}
                              @enderror
                          </span>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="time">Time:</label>
                                    <input type="time" class="form-control" style="border: 0.5px solid;" id="time"
                                        name="time">
                                        <span style="color:red;"> @error('time')
                                          {{ $message }}
                                      @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">

                                    <label for="end_time">End Time</label>
                                    <input type="time" id="timemin" class="form-control" name="end_time" 
                                        min="">
                                        <span style="color:red;"> @error('end_time')
                                          {{ $message }}
                                      @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">

                                    <label for="datemax">Start_date</label>
                                    <input type="date" id="datemax" class="form-control" name="start_date" 
                                        min="{{ date('Y-m-d') }}">
                                        <span style="color:red;"> @error('start_date')
                                          {{ $message }}
                                      @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-responsive" id="myTable">
        <thead>
            <tr class="table-danger">


                <th>S.No.</th>
                <th>Type</th>
                <th> Description</th>
                <th> Time</th>
                <th> Start Date</th>
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

                    <td>{{ $emp->type }}</td>
                    <td class="description-cell">{{ $emp->description }}</td>

                    <td>{{ $emp->time }}
                        {{ $emp->end_time }} </td>
                    <td> {{ $emp->start_date }} </td>
                    <td> <a href="event_update/{{ $emp->id }}" class="text"><i
                                class="fa-solid fa-pen-to-square"style="color:green;"></i></a>
                        <a href="deleted/{{ $emp->id }}" onclick="return confirmDelete()"><i
                                class="fa-sharp fa-solid fa-trash" style="color:red;"></i></a>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
    <!-- </div>
    </div> -->

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete event ");
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timeInput = document.getElementById('time');
            const currentTime = new Date();

            // Format current time as HH:mm
            const currentHours = currentTime.getHours().toString().padStart(2, '0');
            const currentMinutes = currentTime.getMinutes().toString().padStart(2, '0');
            const currentFormattedTime = `${currentHours}:${currentMinutes}`;

            // Set the minimum time value for the input to the current time
            timeInput.min = currentFormattedTime;
        });
    </script>
@endsection
