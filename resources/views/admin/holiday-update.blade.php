@extends('admin.main.main')

@section('admin-content')
    <div class="row">
        <div class=" col-lg-8 grid-margin stretch-card">
            <div class="card" style="background:#97c4dd;">

    <div class="card-header">
        <h4 class=text-center>Update Holiday</h4>

        <div class="card-body">


<form method="POST" action="{{ url('holiday_update') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
         <div class="form-group">
         <label for="exampleInputUsername1">Day</label>
         <input type="text" class="form-control" style="border: 0.5px solid; " value="{{ $data->name }}"id="exampleInputUsername1" placeholder="notification " name="name">
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Description:</label>
         <textarea type="text" class="form-control"style="border: 0.5px solid;" id="exampleInputEmail1"
         name="description" value="">{{ $data->description }}</textarea>
       </div>
          <div class="form-group">
               <label for="exampleInputEmail1">Time:</label>
               <input type="date" class="form-control" style="border: 0.5px solid;" id="date" name="date" valua="{{ $data->date }}">
           </div>
       <button type="submit" class="btn btn-primary mr-2">update</button>
     </form>

    </div>

</div>
</div>
</div>
</div>
    @endsection
