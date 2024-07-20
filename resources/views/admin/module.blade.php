@extends('admin.main.main')

@section('admin-content')
    @if (Session::has('success'))
        <div class="alert alert-success" id="success-message" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('fail'))
        <div class="alert alert-danger" id="error-message" role="alert">
            {{ Session::get('fail') }}
        </div>
    @endif
    <div class="row mt-4" id="my Table">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Project Module Details</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Project ID</th>
                                <th scope="col">Project name</th>

                                <th scope="col">Module</th>
                                <th scope="col">Module Description</th>
                                <th scope="col">Module Installement</th>
                                <th scope="col">Module Date</th>
                                {{-- <th>Action</th> --}}
                                <th scope="col">Module Payment</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($modules as $item)
                                <tr>
                                    <th scope="row">{{$item['id']}}</th>
                                    <td>{{$item['project_id']}}</td>
                                    <td>{{ $item->project->project_name }}</td> <!-- Fetching the project name -->

                                    <td>{{$item['module']}}</td>
                                    <td>{{$item['module_description']}}</td>
                                    <td>{{$item['module_installment']}}</td>
                                    <td>{{$item['date']}}</td>
                                    {{-- <td>
                                        <a href="{{url('edit-module/'.$item->id)}}" style="background-color: #114b07; color:white; padding:12px 30px; text-decoration:none; border-radius:5px;">Edit</a>

                                        <a href="{{url('delete-module/'.$item->id)}}" class="btn btn-danger">Delete</a>
                                    </td> --}}
                                    <td><a href="{{ url('/module/project-payment/' . $item->id) }}" class="btn btn-info">Add Payment</a>
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
            $('#success-message').fadeOut('fast')
        }, 6000);

        setTimeout(() => {
            $('#error-message').fadeOut('fast')
        }, 6000);

        function confirmDelete() {
            return confirm('Are you sure You want to delete Project Information');
        }
    </script>
@endsection
