@extends('admin.main.main')

@section('admin-content')

<div class="container">
    <h4 class="mb-4 text-center">Project Details Form</h4>
    <form action="{{ url('project-info-update') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $data->id }}" name="id">
        <div class="row" style="background: #e6ebe8">
            <div class="col-6">
                <div class="form-group">
                    <label for="project_name">Project Name</label>
                    <input type="text" class="form-control" placeholder="Enter Project Name" name="project_name" value="{{ $data->project_name }}">
                    @error('project_name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="project_technology">Technology Name</label>
                    <input type="text" class="form-control" placeholder="Enter Technology Name" name="project_technology" value="{{ $data->project_technology }}">
                    @error('project_technology')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="project_description">Project Description</label>
                    <textarea class="form-control" rows="4" name="project_description">{{ $data->project_description }}</textarea>
                    @error('project_description')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="project_duration">Project Duration (Months)</label>
                    <input type="number" class="form-control" placeholder="Enter Project Duration" name="project_duration" value="{{ $data->project_duration }}" id="duration">
                    @error('project_duration')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="project_start_date">Project Start Date</label>
                    <input type="date" class="form-control" name="project_start_date" value="{{ $data->project_start_date }}" id="start_date">
                    @error('project_start_date')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="project_end_date">Project End Date</label>
                    <input type="date" class="form-control" name="project_end_date" value="{{ $data->project_end_date }}" id="end_date" readonly>
                    @error('project_end_date')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="project_cost">Project Cost</label>
                    <input type="text" class="form-control" placeholder="Enter Project Cost" name="project_cost" value="{{ $data->project_cost }}">
                    @error('project_cost')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- @php
                $modules = json_decode($data->project_modules, true);
            @endphp

            @if($modules)
                @foreach($modules as $index => $module)
                    <div class="col-6">
                        <div class="form-group">
                            <label for="project_module_{{ $index }}">Module No</label>
                            <input type="text" class="form-control" name="inputs[{{ $index }}][project_module]" value="{{ $module['module'] }}">
                            @error("inputs.{{ $index }}.project_module")
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="project_module_description_{{ $index }}">Module Description</label>
                            <textarea class="form-control" rows="2" name="inputs[{{ $index }}][project_module_description]">{{ $module['description'] }}</textarea>
                            @error("inputs.{{ $index }}.project_module_description")
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-6">
                    <div class="form-group">
                        <label for="project_module_0">Module No</label>
                        <input type="text" class="form-control" name="inputs[0][project_module]" value="">
                        @error("inputs.0.project_module")
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="project_module_description_0">Module Description</label>
                        <textarea class="form-control" rows="2" name="inputs[0][project_module_description]"></textarea>
                        @error("inputs.0.project_module_description")
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif --}}
        </div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>
<script>
    $(document).ready(function(){
        setTimeout(() => {
            $('#success-message').fadeOut('fast');
        }, 3000);

        setTimeout(() => {
            $('#error-message').fadeOut('fast');
        }, 3000);

        $('#start_date, #duration').on('change', function(){
            var startDate = $('#start_date').val();
            var duration = $('#duration').val();

            if(startDate && duration) {
                var start = new Date(startDate);
                var end = new Date(start.setMonth(start.getMonth() + parseInt(duration)));
                var endDate = end.toISOString().split('T')[0]; // Format date to YYYY-MM-DD
                $('#end_date').val(endDate);
            }
        });

        $('#add_more').click(function(){
            var moduleIndex = $('#module-container').children().length / 3;

            $('#module-container').append(
                `<div class="col-5">
                    <div class="form-group">
                        <label for="module">Module No</label> 
                        <input type="text" class="form-control" placeholder="Enter number of modules" name="module[]"> 
                    </div> 
                </div>
                <div class="col-5"> 
                    <div class="form-group"> 
                        <label for="module_description">Module Description</label> 
                        <textarea class="form-control" rows="2" name="module_description[]" placeholder="Enter Module Description"></textarea> 
                    </div>
                </div>
                <div class="col-2">
                    <label for="action">Action</label>
                    <button type="button" class="btn btn-danger remove-module">Remove</button>
                </div>`
            );
        });

        $(document).on('click', '.remove-module', function(){
            $(this).closest('.col-2').prev('.col-5').remove();
            $(this).closest('.col-2').prev('.col-5').remove();
            $(this).closest('.col-2').remove();
        });
    });
</script>
@endsection

