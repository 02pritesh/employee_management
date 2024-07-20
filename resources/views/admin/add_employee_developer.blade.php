@extends('admin.main.main')

@section('admin-content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert" id="success-message">
        {{Session::get('success')}}
    </div>
@endif

<div class="container" >
    <h4 class="mb-4 text-center" style="background:#97c4dd;">Employee Developer Form</h4>
    <form action="{{url('add-employee-developer')}}" method="POST">
        @csrf
        <div class="row" style="background: #e6ebe8">
            <div class="col-6">
                <div class="form-group">
                    <label for="project_name">User Name</label>
                    <input type="text" class="form-control" name="employee_name" value="{{Session::get('username')}}" disabled>
                    @error('employee_name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Profile</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="employee_profile">
                      <option selected >choose your profile</option>
                      <option value="frontend developer">Frontend Developer</option>
                      <option value="backend developer">Backend Developer</option>
                      <option value="fullstack developer">FullStack Developer</option>
                    </select>
                    @error('employee_profile')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                  </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="duration">Project completed:</label>
                    <input type="number" class="form-control" placeholder="Enter number How many project you Completed" name="employee_project_completed" id="duration">
                    @error('employee_project_completed')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="project_cost">Technology</label>
                    <input type="text" class="form-control" placeholder="Enter your technology" name="employee_technology">
                    @error('employee_technology')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="start_date">Experience</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="employee_experience">
                        <option selected>choose your Experience</option>
                        <option value="fresher">Fresher</option>
                        <option value="experience">Experience</option>
                      </select>
                    @error('employee_experience')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            

            <div class="col-6">
                <div class="form-group">
                    <label for="project_cost">Experience Time : (Year/Month)</label>
                    <input type="text" class="form-control" placeholder="Enter Project Cost" name="employee_experience_time">
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