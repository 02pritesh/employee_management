@extends('admin.main.main')

@section('admin-content')

    <div class="container">
        <h1>Update Leave Status</h1>
        <p><strong>Leave Date:</strong> {{ $data->date }}</p>
        <p><strong>Status:</strong> {{ $data->status }}</p>

        <form method="post" action="{{ url('update') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $data->user_id }}">
            <input type="hidden" name="start_date" value="{{ $data->start_date}}">

            <label for="status">Update Status:</label>
            <select name="status" id="status">
                <option value="Approved">Approved</option>
                <option value="reject">Reject</option>
            </select>

            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>
@endsection


