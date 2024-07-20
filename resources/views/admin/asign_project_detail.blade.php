@extends('admin.main.main')

@section('admin-content')

    @if (session('success'))
        <div  id ="success-message" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    
    @if (session('fail'))
        <div  id ="error-message" class="alert alert-danger" role="alert">
            {{ session('fail') }}
        </div>
    @endif

    <div class="row mt-4" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Project Module Details</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" >
                            <thead>
                                <tr>
                                    <th scope="col">Employee Id</th>
                                    <th scope="col">Project Id</th>
                                    <th scope="col">Employee Name</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <th scope="row">{{$item['employee_id']}}</th>
                                    <td>{{$item['project_id']}}</td>
                                    <td>{{$item['employee_name']}}</td>
                                    <td>{{$item['project_name']}}</td>
                                    <td>{{$item['employee_profile']}}</td>
                                    <td>
                                        <a href="edit-asign-project-detail/{{$item->id}}" style="background-color: #114b07; color:white; padding:12px 30px; text-decoration:none; border-radius:5px;">Edit</a>
                                        <a href="delete-asign-project-detail/{{$item->id}}" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            $('#success-message').fadeOut('fast');
        }, 5000);

        setTimeout(() => {
            $('#error-message').fadeOut('fast');
        }, 5000);

        function confirmDelete(){
            return confirm('Are You sure You want to delete Employee asign project details!');
        }

    </script>

@endsection