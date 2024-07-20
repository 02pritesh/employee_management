@extends('user.main.main')

@section('user-content')
    <style>
        .profile-picture {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-left: 50px;
        }
    </style>

    @if (Session::has('success'))
        <div id="success-message" class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('fail'))
        <div id="success-message" class="alert alert-danger " role="alert">
            {{ Session::get('fail') }}
        </div>
    @endif

    <h2 class="text-center"> My Profile</h2>
    <div class="profile-card">
        <div class="row">
            <div class="col-lg-5">
                @if (!empty($data->file))
                    <img class="profile-picture" src="{{ asset('public/assets/uploads/img/' . $data->file) }}"
                        class="rounded-circle">
                @else
                    <img class="profile-picture" src="{{ asset('public/assets/images/faces/face3.jpg') }}" alt="image"
                        class="rounded-circle" class="profile-picture">
                @endif

                <h3 class="ml-5 mt-1"> {{ $data->name }}</h3>
                <div class="d-flex">
                    <h6><a href="/profile/ {{ $data->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal "
                            class="btn btn-info ml-3">Edit Profile</a> </h6>
                    <h6><a href="{{url('reset_pass')}}/{{ $data->id }}" class="btn btn-info ml-3 ">Reset Password</a> </h6>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" disabled placeholder="Username"
                                style="border: 0.5px solid;" aria-label="Username" value="{{ $data->name }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" disabled placeholder="Username"
                                style="border: 0.5px solid;"aria-label="Username" value="{{ $data->email }}">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" disabled placeholder="Username" aria-label="Username"
                                style="border: 0.5px solid;"value="{{ $data->phone }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control" disabled placeholder="Username"
                                aria-label="Username"style="border: 0.5px solid;" value="{{ $data->Department }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" disabled placeholder="Username"
                                aria-label="Username"style="border: 0.5px solid;" value="{{ $data->city }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" disabled placeholder="Address" aria-label="Username"
                                style="border: 0.5px solid;"value="{{ $data->address }}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Profile </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('profile-update') }} "method="post" enctype="multipart/form-data">
                        @csrf
                        @if (\Session::has('success'))
                            <div id="success-message" class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif

                        <input type="hidden" name="id" value="{{ $data->id }}">

                        <div class="form-group">
                            <label for="title">phone</label>
                            <input type="text" class="form-control" id="form4Example3"
                                style="border: 0.5px solid;"name="phone" value="{{ $data->phone }}" />
                        </div>



                        <div class="form-group">
                            <label for="message">address</label>
                            <input type="text" class="form-control" disable id="form4Example3"
                                rows="3"style="border: 0.5px solid;" value="{{ $data->address }}" name="address">
                        </div>

                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <input type="file" class="form-control-file" id="image" name="file"
                                value="{{ $data->file }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
            </form>
        </div>

    </div>

    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 5000); // 5000 milliseconds = 5 seconds (adjust as needed)
    </script>
@endsection
