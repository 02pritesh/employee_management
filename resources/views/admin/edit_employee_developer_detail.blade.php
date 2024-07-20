@extends('admin.main.main')

@section('admin-content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert" id="success-message">
        {{Session::get('success')}}
    </div>
@endif

<div class="container" >
    <h4 class="mb-4 text-center" style="background:#97c4dd;">Edit Employee Developer Details</h4>
    <form action="{{url('edit-employee-developer-detail')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="row" style="background: #e6ebe8">
            <div class="col-6">
                <div class="form-group">
                    <label for="project_name">User Name</label>
                    <input type="text" class="form-control" name="employee_name" value="{{$data->employee_name}}" disabled>
                    @error('employee_name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Profile</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="employee_profile">
                        <option value="" disabled selected>Choose your Profile</option>
                        <option value="frontend developer" {{ (old('employee_profile', $data->employee_profile ?? '') == 'frontend developer') ? 'selected' : '' }}>Frontend Developer</option>
                        <option value="backend developer" {{ (old('employee_profile', $data->employee_profile ?? '') == 'backend developer') ? 'selected' : '' }}>Backend Developer</option>
                        <option value="fullstack developer" {{ (old('employee_profile', $data->employee_profile ?? '') == 'fullstack developer') ? 'selected' : '' }}>FullStack Developer</option>
                    </select>
                    @error('employee_profile')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    

            <div class="col-6">
                <div class="form-group">
                    <label for="duration">Project completed:</label>
                    <input type="number" class="form-control" placeholder="Enter number How many project you Completed" name="employee_project_completed" id="duration" value="{{$data->employee_project_completed}}">
                    @error('employee_project_completed')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="project_cost">Technology</label>
                    <input type="text" class="form-control" placeholder="Enter your technology" name="employee_technology" value="{{$data->employee_technology}}">
                    @error('employee_technology')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Experience</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="employee_experience">
                        <option value="" disabled selected>Choose your Experience</option>
                        <option value="fresher" {{ (old('employee_experience', $data->employee_experience ?? '') == 'fresher') ? 'selected' : '' }}>Fresher</option>
                        <option value="experience" {{ (old('employee_experience', $data->employee_experience ?? '') == 'experience') ? 'selected' : '' }}>Experience</option>
                    </select>
                    @error('employee_experience')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            

            <div class="col-6">
                <div class="form-group">
                    <label for="project_cost">Experience Time : (Year/Month)</label>
                    <input type="text" class="form-control" placeholder="Enter Project Cost" name="employee_experience_time" value="{{$data->employee_experience_time}}">
                    @error('employee_experience_time')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>

@endsection