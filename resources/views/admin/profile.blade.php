@extends('admin.main.main')

@section('admin-content')
        <div class="col-md-9 grid-margin stretch-card justify-content-center">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Profile</h4>
                  @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                  <form action="{{url('Profile-data')}} "method ="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$data->id}}">

                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control form-control-lg"  name="phone"  value="{{$data->phone}}" placeholder="Username" aria-label="Username">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" value="{{$data->address}}" name="address">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control form-control-sm" placeholder="Username" aria-label="Username" name="file"  value="{{$data->file}}">
                  </div>

                <button type="submit" class="btn btn-primary">Edit Profile</button>
                </div>
              </div>
            </div>
            </form>
@endsection


