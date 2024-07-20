@extends('admin.main.main')

@section('admin-content')
    <div class="container">

        <h4 class="text-center mb-4">Asign Project</h4>
        <form action="{{ url('asign-project') }}" method="POST">
            @csrf

            <div class="row" style="background: #e6ebe8">
                <div class="col-6">
                    <div class="form-group">
                        <label for="project_id">Project Name:</label><br>
                        <select name="project_id" id="project_id" class="form-control">
                            <option disabled selected>Choose Project Name You Asign</option>
                            @foreach ($project as $proj)
                                <option value="{{ $proj->id }}">
                                    {{ $proj->project_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <select id="profile" name="employee_profile" class="form-control">
                            <option value="">Select Profile</option>
                            <option value="frontend developer">Frontend developer</option>
                            <option value="backend developer">Backend developer</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="employee_name">Employee Name</label>
                        <select name="employee_id[]" id="employee_id" class="form-control" multiple>
                            <option value="" disabled>Select Employee</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}" data-profile="{{ $item->profile }}">{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('#employees').select2({
                placeholder: "Select employees"
            });
        });

        $(document).ready(function() {
            const profileSelect = $('#profile');
            const employeeSelect = $('#employee_id');
            // const employeeSelectName = $('#employee_name');
            const allEmployees = employeeSelect.children('option').slice(1);

            profileSelect.on('change', function() {
                const selectedProfile = $(this).val() ;

                // Clear current employee options
                employeeSelect.html(
                '<option value="{{ $item->name }}" disabled>Select Employee</option>');

                // // Clear current employee options
                // employeeSelect.html('<option value="{{ $item->id }}" disabled>Select Employee</option>');

                // Filter employees based on selected profile
                const filteredEmployees = allEmployees.filter(function() {
                    const profile = $(this).data('profile');
                    return profile === selectedProfile
                    // return profile === selectedProfile || profile === 'fullstack developer';
                });

                // Append filtered employees to the employee select box
                employeeSelect.append(filteredEmployees);
            });
        });

    </script>
@endsection
