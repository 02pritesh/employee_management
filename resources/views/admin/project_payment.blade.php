@extends('admin.main.main')

@section('admin-content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert" id="success-message">
            {{ session::get('success') }}
        </div>
    @endif

    @if (Session::has('fail'))
        <div class="alert alert-danger" role="alert" id="error-message">
            {{ session::get('fail') }}
        </div>
    @endif

    <div class="container">
        <form action="{{ url('module-update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">
    
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="module">Module</label>
                        <input type="text" class="form-control" name="module" value="{{ $data->module }}" readonly>
    
                        @error('module')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="project_name">Project Name</label>
                        <input type="text" class="form-control" name="project_name" value="{{ $data->project->project_name }}" readonly>
    
                        @error('project_name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="module_installment">Module Installment</label>
                        <input type="text" class="form-control" name="module_installment">
    
                        @error('module_installment')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="module_date">Module Date</label>
                        <input type="date" class="form-control" name="module_date" >
    
                        @error('module_date')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="module_description">Module Description</label>
                        <textarea class="form-control" name="module_description" rows="3">{{ $data->module_description }}</textarea>
    
                        @error('module_description')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
    
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
    
    <script>
        setTimeout(() => {
            $('#success-message').fadeOut('fast')
        }, 8000);

        setTimeout(() => {
            $('#error-message').fadeOut('fast')
        }, 8000);

        function confirmDelete() {
            return confirm('Are you sure You want to delete Project Information');
        }
    </script>
@endsection
