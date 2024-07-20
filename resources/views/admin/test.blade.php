@extends('admin.main.main')

@section('admin-content')
<table class="table table-bordered  table-striped">
<body>
             <thead>
                   <tr class="table-danger">
                <th>Daily Incentive</th>
                <th>Percentage</th>
            </tr>
        </thead>
        <tbody> 
        <tr>
             <td> {{ $data->incentive }}</td>
             <td> {{ $data->percentage }}</td>
    

                       
                </tr>
            
        </tbody>
    </table>
  
@endsection

