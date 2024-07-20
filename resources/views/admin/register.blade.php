@extends('admin.main.main')

@section('admin-content')
    <h4 class="card-title text-center pt-2" style="background-color: #844fc1; height:40px; color:white;">
        Employee Registration Here:</h4>

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('fail'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('fail') }}
        </div>
    @endif
    <div class="col-12 grid-margin">
        <div class="card">

            <div class="card-body">
                <form action="{{ url('register') }}" method="post">
                    @csrf
                    <form class="form-sample">
                        <p class="card-description">
                            Personal info
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="enter your name here"
                                            name="name" style="border:1px solid;" />
                                        <span style="color:red;"> @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="enter email address here"
                                            name="email" style="border:1px solid;" />
                                        <span style="color:red;"> @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone No</label>
                                    <div class="col-sm-9">
                                        <input type="tel" pattern="[0-9]{10}" name="phone"
                                            placeholder="Enter 10-digit phone number" class="form-control"
                                            style="border: 1px solid;">
                                        <span style="color: red;">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Profile</label>
                                    <div class="col-sm-9 ">
                                        <select class="form-control" id="exampleFormControlSelect2" name="profile" style="border:1px solid;">
                                            <option selected>choose your profile</option>
                                            <option value="frontend developer">Frontend Developer</option>
                                            <option value="backend developer">Backend Developer</option>
                                            <option value="fullstack developer">FullStack Developer</option>
                                        </select>
                                        @error('profile')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Experience</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="exampleFormControlSelect2"
                                            name="experience" style="border:1px solid;">
                                            <option selected>choose your Experience</option>
                                            <option value="fresher">Fresher</option>
                                            <option value="experience">Experience</option>
                                        </select>
                                        @error('experience')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Technology</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter your technology"
                                            name="technology" style="border:1px solid;">
                                        @error('technology')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="city"
                                            placeholder="enter your city" style="border:1px solid;" />
                                        <span style="color:red;"> @error('city')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="enter your password" style="border:1px solid; ">
                                        <span style="color:red;"> @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Resister</button>

                    </form>


            </div>
        </div>
    </div>


    {{-- <table class="table table-bordered  table-striped" id="myTable">
              <thead>
              <tr class="table-danger">


                  <th> S./No</th>
                  <th>  Name </th>
                  <th> Email</th>
                  <th> Phone</th>
                  <th> City </th>
                  <th> Department</th>
                  <th>   Action </th>

                </tr>
              </thead>
              <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($data as $emp)
                <tr class="table-info">
                <td >{{$i++}}</td>

                <td >{{$emp->name}}</td>

                <td>{{$emp->email}}</td>
                <td>{{$emp->phone}}</td>
                <td> {{$emp->city}} </td>
                  <td> {{$emp->Department}} </td>
          <td> <a href="register_update/{{ $emp->id}}" class=""><i class="fa-solid fa-pen-to-square" style="color:green;"></i></a>
          <a href="delete/{{ $emp->id}}" ><i class="fa-sharp fa-solid fa-trash" style="color:red;"></i></a></td>

              </tr>
                @endforeach

              </tbody>
              </table> --}}






    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete employee page?");
        }
    </script>
@endsection

<!-- container-scroller -->
<!-- base:js -->
