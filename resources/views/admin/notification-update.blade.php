@extends('admin.main.main')

@section('admin-content')
    <h4 class="card-title pt-2 pl-3" style="background-color: #844fc1; height:40px; color:white;">Event Organization</h4>

    <div class="row">

        <div class=" grid-margin stretch-card">

            <div class="card" style="background:#97c4dd;">
                <div class="card-body">
                    <h3 class="card-title text-center">Notification</h3>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ url('notification_edit') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">

                        <div class="form-group">
                            <label for="exampleInputUsername1">Type</label>
                            <input type="text" class="form-control" style="border: 0.5px solid; "
                                id="exampleInputUsername1" placeholder="notification " value="{{ $data->type }}"name="type">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">content</label>
                            <textarea type="text" class="form-control"style="border: 0.5px solid;" value=""id="exampleInputEmail1" name="content">{{ $data->content }}</textarea>
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
    @endsection
