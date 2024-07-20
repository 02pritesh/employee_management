@extends('user.main.main')

@section('user-content')
@if(Session::has('fail'))
    <div id ="success-message" class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
@endif

@if (Session::has('success'))
<div id ="success-message" class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>

@endif

        <div class="row justify-content-center"> <!-- Add justify-content-center class to center the row -->
            <div class=" col-lg-9 grid-margin stretch-card"> <!-- Adjust the col-lg-6 class to the desired width for the form -->
                <div class="card" style="background:#97c4dd;">
                    <div class="card-body">
                        <h2 class="card-title text-center">Attendance</h2>


                        <form action="{{url('attandence')}} " method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="form4Example3" rows="3" name="date" value="{{ $currentDate }}">
                            </div>
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="form4Example3" rows="3" name="user_id" value="">
                            </div>
                            <div class="form-group">
                                <label for="title">Employee Name</label>
                                <input type="text" class="form-control" id="form4Example3" rows="3" name="name" value="{{$name}}" disabled>
                            </div>
                                    <div class="form-group">
                                        <label for="attendence_status">Attendance Status</label>
                                        <select class="form-select" class="form-control" id="attendance_status" id="form4Example3" rows="3" name="attendence_status" required >
                                            <option selected disabled>Status</option>
                                            <option value="1">Present</option>
                                            <option value="0">Absent</option>
                                        </select>
                                        
                                    </div>
                                   
                                   

                                {{-- <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="message">Select Month</label>
                                        <select class="form-select col-lg-10" name="month" aria-label="Default select example">
                                            <option selected>Select Month</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="message">Select Year</label>
                                        <select class="form-select col-lg-10" class="form-control" id="attendance_status" id="form4Example3" rows="3" name="year" required>
                                            <option selected>Year</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                        </select>
                                    </div>
                                </div> --}}

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




