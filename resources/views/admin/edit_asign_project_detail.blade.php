@extends('admin.main.main')

<style>
    /* Style for the custom-select-bg class */
    .custom-select-bg {
        background-color: #2d7ca3 !important; /* Desired background color */
        color: #fff !important; /* Text color for contrast */
    }
</style>

@section('admin-content')
    <div class="container">
        <form action="{{ url('edit-asign-project-detail') }}" method="POST">
            @csrf

            <div class="row" style="background: #e6ebe8">
                <div class="col-6">
                    <div class="form-group">
                        <label for="project_id">Project Name:</label><br>
                        <select name="project_id" id="project_id" class="form-control">
                            <option value="{{ $data->project_id }}">
                                {{ $data->project_name }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Profile</label>
                        <select id="profile" name="employee_profile" class="form-control">
                            <option value="frontend developer"
                                {{ old('employee_profile', $data->employee_profile ?? '') == 'frontend developer' ? 'selected' : '' }}>
                                Frontend Developer
                            </option>
                            <option value="backend developer"   
                                {{ old('employee_profile', $data->employee_profile ?? '') == 'backend developer' ? 'selected' : '' }}>
                                Backend Developer
                            </option>
                        </select>
                        @error('employee_profile')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="employee_name">Employee Name</label>
                        <select name="employee_id[]" id="employee_id" class="form-control" multiple>
                            <option value="">Select Employee</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}" data-profile="{{ $item->profile }}"
                                    {{ $data->employee_names && $data->employee_names->contains($item->id) ? 'selected class=custom-select-bg' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Apply custom background to pre-selected options
            $('#employee_id option:selected').each(function() {
                $(this).addClass('custom-select-bg');
            });

            var selectedProfile = $('#profile').val();

            $('#employee_id option').each(function() {
                if ($(this).data('profile') != selectedProfile) {
                    $(this).hide();
                }
            });

            $('#profile').on('change', function() {
                var selectedProfile = $(this).val();
                $('#employee_id option').each(function() {
                    if ($(this).data('profile') == selectedProfile) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
@endsection
