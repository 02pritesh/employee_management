@extends('admin.main.main')

@section('admin-content')
          <div class="row">
            <div class="  grid-margin stretch-card">
              <div class="card" style="background:#97c4dd;">
                <div class="card-body">
                  <h3 class="card-title text-center">Event Organization</h3>
                  @if (Session::has('success'))
                     <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                           @endif
                           <form action="{{url('event_update')}}" method="post">
                     @csrf     
                     <input type="hidden" name="id" value="{{$data->id}}">
              
                      <div class="form-group">
                      <label for="exampleInputUsername1">Type</label>
                      <input type="text" class="form-control" style="border: 0.5px solid; "value="{{$data->type}}" id="exampleInputUsername1" placeholder="event type" name="type">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">description</label>
                      <input type="text" class="form-control"style="border: 0.5px solid;" value="{{$data->description}}"id="exampleInputEmail1" name="description">
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                       <div class="form-group">
                            <label for="time">Time:</label>
                            <input type="time" class="form-control" style="border: 0.5px solid;" value="{{$data->time}}"id="time" name="time" required>
                        </div></div>
                    <div class="col-lg-4">
                    <div class="form-group">

                  <label for="time">end_time</label>
                    <input type="time" id="timemin " style="border: 0.5px solid;" class="form-control" value="{{$data->end_time}}"name="end_time"><br><br>
                </div></div>                       
                 <div class="col-lg-4">
                 <div class="form-group">

                    <label for="datemax">start_date</label>
                    <input type="date" id="datemax" style="border: 0.5px solid; " class="form-control"value="{{$data->start_date}}" name="start_date"><br><br>
                                     </div></div>  </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                  </form>
                </div>
              </div>
            </div>
            @endsection