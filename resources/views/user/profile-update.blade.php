@extends('user.main.main')

@section('user-content')



<form action="{{url('profile-update')}} "method ="post" enctype="multipart/form-data">
          @csrf 
          @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
    
          <input type="hidden" name="id" value="{{$data->id}}">

          <div class="form-group">
            <label for="title">phone</label>
            <input type="text"  class="form-control" id="form4Example3" rows="3"  name="address" style="width:400px"valaue="{{$data->phone}}" name="address">
        </div>
  
  
  
        <div class="form-group">
            <label for="message">address</label>
            <input type="text"  class="form-control" id="form4Example3" rows="3"  style="width:400px"valaue="{{$data->address}}" name="address">
        </div> 
 
        <div class="form-group">
    <label for="image">Choose Image</label>
    <input type="file" class="form-control-file" id="image" name="file"  value="{{$data->file}}">
     </div>
          <div class="footer" style="margin-top:10px;">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
</div>
          </form>



@endsection


