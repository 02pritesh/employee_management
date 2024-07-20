@extends('admin.main.main')

@section('admin-content')


    @if (Session::has('success'))
        <div class="alert alert-success" role="alert" id="success-message">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('fail'))
        <div class="alert alert-danger" role="alert" id="error-message">
            {{ Session::get('fail') }}
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Project Details</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Project Id</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Project Technology</th>
                                    <th scope="col">Project Description</th>
                                    <th scope="col">Project Duration</th>
                                    <th scope="col">Project Start Date</th>
                                    <th scope="col">Project End Date</th>
                                    <th scope="col">Project Modules</th>
                                    <th scope="col">Project Cost</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Project</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->project_name }}</td>
                                        <td>{{ $item->project_technology }}</td>
                                        <td>{{ $item->project_description }}</td>
                                        <td>{{ $item->project_duration }}</td>
                                        <td>{{ $item->project_start_date }}</td>
                                        <td>{{ $item->project_end_date }}</td>
                                        {{-- <td>
                                            @if ($item->project_modules)
                                                <ul>
                                                    @foreach (json_decode($item->project_modules, true) as $module)
                                                        Module{{ $module['module'] }}: - {{ $module['description'] }} <br><br>
                                                    @endforeach
                                                </ul>
                                            @else
                                                No modules defined
                                            @endif
                                        </td> --}}
                                        <td>{{ $item->project_cost }}</td>
                                        <td>
                                            <a href="project-info-edit/{{ $item->id }}"  style="background-color: #114b07; color:white; padding:12px 30px; text-decoration:none; border-radius:5px;">Edit</a>
                                            <a href="project-info-delete/{{$item->id}}" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                                        </td>
                                        <td>
                                            @if($item->project_status == 'Pending')
                                                <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#updateModal{{ $item->id }}">{{ $item->project_status }}</a>
                                            @elseif($item->project_status == 'Complete')
                                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#updateModal{{ $item->id }}">{{ $item->project_status }}</a>
                                            @endif
                                        </td>
                                    
                                        <td>
                                            <a href="view-project-employee/{{$item->id}}" style="background-color: #23818f; color:white; padding:12px 30px; text-decoration:none;">Project Employee</a>
                                        </td>
                                        <td>
                                            <form action="project-info/module/{{$item->id}}" method="get" style="display:inline;">
                                                {{-- <input type="hidden" name="id" value="{{$item->id}}"> --}}
                                                <button type="submit" style="background-color: #23818f; color: white; padding: 12px 30px; border: none; cursor: pointer;">View Module</button>
                                            </form>
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

    <!-- Modals for project status update -->
    @foreach($data as $item)
        <div class="modal fade" id="updateModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Project Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="project-info" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Pending" {{ $item->project_status == 'Pending' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Pending</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Complete" {{ $item->project_status == 'Complete' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Complete</label>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- JavaScript for message fade-out and delete confirmation -->
    <script>
        setTimeout(() => {
            $('#success-message').fadeOut('fast')
        }, 3000);

        setTimeout(() => {
            $('#error-message').fadeOut('fast')
        }, 3000);

        function confirmDelete() {
            return confirm('Are you sure You want to delete Project Information');
        }
    </script>
@endsection
