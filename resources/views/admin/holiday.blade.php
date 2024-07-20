@extends('admin.main.main')

@section('admin-content')
@if (Session::has('success'))
<div  id ="success-message" class="alert alert-success" role="alert">
       {{Session::get('success')}}
   </div>
      @endif
<h4 class="card-title pt-2 pl-3 mb-4" style="background-color: #844fc1; height:40px; color:white;">Holiday</h4>

          <div class="row">
            <div class=" col-lg-8 grid-margin stretch-card">
              <div class="card" style="background:#97c4dd;">
                <div class="card-body">
                  <h2 class="card-title text-center">Holiday</h2>

                  <form action="{{url('holiday')}}" method="post">
                     @csrf
                     <input type="hidden" class="form-control" style="border: 0.5px solid; " id="exampleInputUsername1" placeholder="notification " name="attendence">
                     <span style="color: red;">
                      @error('attendence')
                        {{$message}}
                      @enderror
                     </span>

                      <div class="form-group">
                      <label for="exampleInputUsername1"><h6>Day</h6></label>
                      <input type="text" class="form-control" style="border: 0.5px solid; " id="exampleInputUsername1" placeholder="notification " name="name" >
                      <span style="color: red;">
                        @error('name')
                          {{$message}}
                        @enderror
                       </span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1"><h6>Description</h6></label>
                      <textarea type="text" class="form-control"style="border: 0.5px solid;" id="exampleInputEmail1" name="description"></textarea>
                      <span style="color: red;">
                        @error('description')
                          {{$message}}
                        @enderror
                       </span>
                    </div>
                       <div class="form-group">
                            <label for="exampleInputEmail1"><h6>Time</h6></label>
                            <input type="date" id="datemax" class="form-control" name="date"  min="{{ date('Y-m-d') }}">
                            <span style="color: red;">
                              @error('date')
                                {{$message}}
                              @enderror
                             </span><br>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            
                        </form>
                        </div>

                </div>
              </div>
</div>

</div>

</div>


<div class=" container table-responsive pt-3">
        <table class="table table-bordered " id="myTable">
              <thead>
              <tr class="table-danger">


                  <th>S.No.</th>
                  <th>day</th>
                  <th> Start Date</th>
                  <th> Tittle</th>

                  <th>   Action </th>

                </tr>
              </thead>
              <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($data as $val)
                <tr class="table-info">
                <td >{{$i++}}</td>

                <td >{{$val->name}}</td>

                  <td> {{$val->date}} </td>
                  <td>{{$val->description}}</td>
               <td>
                <a href="holiday_update/{{ $val->id}}" class=""><i class="fa-solid fa-pen-to-square"style="color:green;"></i></a>

          <a href="holiday_delete/{{ $val->id}}" class=""onclick="return confirmDelete()"><i class="fa-sharp fa-solid fa-trash my-3"style="color:red;"></i></a></td>

              </tr>
                @endforeach

              </tbody>
              </table>



        <script>
function confirmDelete() {
    return confirm("Are you sure you want to delete Holiday");
}
</script>


@endsection
