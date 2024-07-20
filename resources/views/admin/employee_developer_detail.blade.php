@extends('admin.main.main')

@section('admin-content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert" id="success-message">
        {{Session::get('success')}}
    </div>
@endif

@if(Session::has('fail'))
    <div class="alert alert-danger" role="alert" id="error-message">
        {{Session::get('fail')}}
    </div>
@endif

<div class="container">
    <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">Employee Id</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Employee Profile</th>
            <th scope="col">Employee Technology</th>
            <th scope="col">Employee Experience</th>
            <th scope="col">Employee Project completed</th>
            <th scope="col">Employee Experience Time</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $item)
          <tr>
            <th scope="row">{{$item['id']}}</th>
            <td>{{$item['employee_name']}}</td>
            <td>{{$item['employee_profile']}}</td>
            <td>{{$item['employee_technology']}}</td>
            <td>{{$item['employee_experience']}}</td>
            <td>{{$item['employee_project_completed']}}</td>
            <td>{{$item['employee_experience_time']}}</td>
            <td>
                <a href="edit-employee-developer-detail/{{$item->id}}" class="btn btn-success">Edit</a>
                <a href="delete-employee-developer-detail/{{$item->id}}" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

<script>
  setTimeout(() => {
    $('#success-message').fadeOut('fast')
  }, 3000);

  setTimeout(() => {
    $('#error-message').fadeOut('fast')
  }, 3000);

  function confirmDelete(){
    return confirm('Are You sure You want to delete employee developer details!');
  }
</script>
@endsection