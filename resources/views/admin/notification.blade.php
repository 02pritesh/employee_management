@extends('admin.main.main')

@section('admin-content')
    <h4 class="card-title pt-2 pl-3" style="background-color: #844fc1; height:40px; color:white;"> Notification</h4>

    <div class="row">

        <div class=" grid-margin stretch-card">

            <div class="card" style="background:#97c4dd;">
                <div class="card-body">
                    <h3 class="card-title text-center">Notification</h3>
                    @if (Session::has('success'))
                        <div  id ="success-message" class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ url('notification') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Type</label>
                            <input type="text" class="form-control" style="border: 0.5px solid; "
                                id="exampleInputUsername1" placeholder="notification " name="type" >
                                <span style="color:red;"> @error('type')
                                    {{ $message }}
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content</label>
                            <textarea type="text" class="form-control"style="border: 0.5px solid;" id="exampleInputEmail1" name="content" ></textarea>
                            <span style="color:red;"> @error('content')
                                {{ $message }}
                            @enderror
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-4">
                           <div class="form-group">
                                <label for="time">Time:</label>
                                <input type="time" class="form-control" style="border: 0.5px solid;" id="time" name="time" required>
                            </div></div>
                        <div class="col-lg-4">
                        <div class="form-group">

                      <label for="time">end_time</label>
                        <input type="time" id="timemin " style="border: 0.5px solid;" class="form-control" name="end_time"><br><br>
                    </div></div>
                     <div class="col-lg-4">
                     <div class="form-group">

                        <label for="datemax">start_date</label>
                        <input type="date" id="datemax" style="border: 0.5px solid; " class="form-control" name="start_date"><br><br> -->

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class=" container table-responsive pt-3">
        <table class="table table-bordered "id="myTable">
            <thead>
                <tr class="table-danger">


                    <th>S.No.</th>
                    <th>Type</th>
                    <th>content</th>
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

                        <td>{{ $emp->content }}</td>
                        <td> <a href="notification_edit/{{ $emp->id }}" class="" ><i class="fa-solid fa-pen-to-square"style="color:green;"></i></a>

                            <a href="{{url('noti_del/'.$emp->id)}}" onclick="return confirmDelete()"><i class="fa-sharp fa-solid fa-trash" style="color:red;"></i></a>


                    </tr>
                @endforeach

            </tbody>
        </table>
        <!-- </div>
    </div>
    </div> -->

        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete Notification?");
            }
        </script>
    @endsection
