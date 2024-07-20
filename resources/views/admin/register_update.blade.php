@extends('admin.main.main')

@section('admin-content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert" id="success-message">
            {{ Session::get('success') }}
        </div>
    @endif



    <div class="row">
        <h3 class="card-title text-center bg-primary p-2 text-light">Update Employee Data</h3>

        <div class=" grid-margin stretch-card">
            <div class="card" style="background:#97c4dd;">
                <div class="card-body">

                    <form action="{{ url('register_update') }}" method="post">
                        @csrf

                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            <div class=" col-lg-6">
                                <div class="form-group my-3 ">
                                    <label> Name </label>
                                    <input type="name" class="form-control form-control-user" id="exampleInputname"
                                        style="border: 0.5px solid;" placeholder="Enter name here" name="name"
                                        value="{{ $data->name }}">
                                    <span style="color:red;"> @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class=" col-lg-6">

                                <div class="form-group my-3 ">
                                    <label> Email</label>

                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        style="border: 0.5px solid;"aria-describedby="emailHelp"
                                        placeholder="Enter Email Address" name="email" value="{{ $data->email }}"
                                        required>
                                    <span style="color:red;"> @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            </span>


                            <div class=" col-lg-6">
                                <div class="form-group my-3">
                                    <label for="exampleFormControlSelect2">Profile</label>
                                    <select class="form-control" id="exampleFormControlSelect2" name="profile">
                                        <option disabled selected>Choose your Profile</option>
                                        <option value="frontend developer"
                                            {{ old('profile', $data->profile ?? '') == 'frontend developer' ? 'selected' : '' }}>
                                            Frontend Developer</option>
                                        <option value="backend developer"
                                            {{ old('profile', $data->profile ?? '') == 'backend developer' ? 'selected' : '' }}>
                                            Backend Developer</option>
                                        <option value="fullstack developer"
                                            {{ old('profile', $data->profile ?? '') == 'fullstack developer' ? 'selected' : '' }}>
                                            FullStack Developer</option>
                                    </select>
                                    @error('profile')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class=" col-lg-6">
                                <div class="form-group my-3">
                                    <label for="exampleFormControlSelect2">Experience</label>
                                    <select class="form-control" id="exampleFormControlSelect2" name="experience">
                                        <option value="" disabled selected>Choose your Experience</option>
                                        <option value="fresher"
                                            {{ old('experience', $data->experience ?? '') == 'fresher' ? 'selected' : '' }}>
                                            Fresher</option>
                                        <option value="experience"
                                            {{ old('experience', $data->experience ?? '') == 'experience' ? 'selected' : '' }}>
                                            Experience</option>
                                    </select>
                                    @error('experience')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class=" col-lg-6">
                                <div class="form-group my-3">
                                    <label>Technology</label>

                                    <input type="text" class="form-control" placeholder="Enter your technology"
                                        name="technology" style="border:1px solid;" value="{{$data->technology}}">
                                    @error('technology')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror


                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group my-3 ">
                                    <label> city</label>
                                    <input type="name" class="form-control form-control-user" id="exampleInputname"
                                        style="border: 0.5px solid;" placeholder="Enter city" name="city"
                                        value="{{ $data->city }}">
                                    <span style="color:red;"> @error('city')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>


                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            $('#success-message').fadeOut('fast')
        }, 3000);
    </script>
@endsection
