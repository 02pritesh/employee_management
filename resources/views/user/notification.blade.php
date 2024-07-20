@extends('user.main.main')

@section('user-content')

@if(Session::has('success'))

        <div class="alert alert-success" role="alert" id="success-message">
            {{Session::get('success')}}
        </div>
    
@endif
@if(Session::has('fail'))
    
        <div class="alert alert-danger" role="alert" id="error-message">
            {{Session::get('fail')}}
        </div>
    
@endif

    <h3>Notification</h3>
    <table class="table table-bordered ">
        <thead>
            <tr class="">
                <th>S.No.</th>
                <th>Date</th>
                <th>Tittle</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $emp)
                <tr class="">
                    <td>{{ $i++ }}</td>
                    <td>{{ $emp->date }}</td>
                    <td><strong>{{ $emp->type }}</strong><br>
                        {{ $emp->content }}</strong><br>
                    </td>
                    <td>
                        <form action="{{ url('notification_delete/'.$emp->id) }}" method="GET">
                            @csrf
                            
                            <button type="submit" class="btn-close" aria-label="Close"></button>
                        </form>
                        
                    </td>



                </tr>
            @endforeach

        </tbody>
    </table>

    </div>

    <script>
        setTimeout(() => {
            $('#success-message').fadeOut('fast');
        }, 3000);

        setTimeout(() => {
            $('#error-message').fadeOut('fast');
        }, 3000);
    </script>
@endsection
