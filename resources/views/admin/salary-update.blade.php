@extends('admin.main.main')

@section('admin-content')

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
       {{Session::get('success')}}
   </div>
      @endif
<h4 class="card-title text-center pt-2"  style="background-color: #844fc1; height:40px; color:white;">Monthly salary add here</h4>
          <div class="row">

            <div class=" col-lg-10 grid-margin stretch-card">
              <div class="card" style="background:#97c4dd;">

                    <div class="card-body">

                           <form action="{{url('salary')}}" method="post">
                        @csrf

                           <input type="hidden" name="id" value="{{$data->id}}">


                            <div class="row">
                                <div class=" col-lg-6">
                                    <div class="form-group my-3 ">
                                        <label> Employee Name</label>
                                        <input type="name" class="form-control form-control-user"
                                            id="exampleInputname" style="border: 0.5px solid;"
                                            placeholder="Enter salary here" name="name" value="{{$data->name}}" disabled>
                                    </div> </div> <div class=" col-lg-6">
                                        <div class="form-group my-3 ">
                                            <label>Department</label>
                                            <input type="name" class="form-control form-control-user"
                                                id="exampleInputname" style="border: 0.5px solid;"
                                                placeholder="Enter salary here" name="department" value="{{$data->Department}}" disabled>
                                        </div> </div>
                            <div class=" col-lg-4">
                            <div class="form-group my-3 ">
                                <label> Salary</label>
                                <input type="name" class="form-control form-control-user"
                                    id="exampleInputname" style="border: 0.5px solid;"
                                    placeholder="Enter salary here" name="salary" value="{{$data->salary}}">
                            </div> </div>

                                <div class=" col-lg-4">
                                <div class="form-group my-3 ">
                                <label>Today_Earning</label>

                                    <input type="text" class="form-control form-control-user"
                                id="exampleInputEmail" style="border: 0.5px solid;"aria-describedby="emailHelp"
                                placeholder="" name="incentive" value="{{$data->incentive}}">
                                </div> </div>


                            <div class=" col-lg-4">
                            <div class="form-group my-3">

                            <label>percentage</label>
                     <input text="number" type="number"  class="form-control form-control-user"
                            id="exampleInputname" style="border: 0.5px solid;"
                            placeholder="Enter department" name="percentage" value="{{$data->percentage}}">
                        </div>
                        </div>
                        {{-- <div class=" col-lg-6">
                            <div class="form-group my-3">

                            <label>month</label>
                     <input type="text" class="form-control form-control-user"
                            id="exampleInputname" style="border: 0.5px solid;"
                            placeholder="Enter department" name="month" value="{{$data->month}}">
                        </div>
                        </div> --}}
                        <div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection
