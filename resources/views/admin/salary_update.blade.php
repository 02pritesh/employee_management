@extends('admin.main.main')

@section('admin-content')
            <h4>Dashboard</h4>
        <div class=" container table-responsive pt-3">
            <table class="table table-bordered "id="myTable">
              <thead>
              <tr class="table-danger">
                        <th>S.No. </th>
                        <th>Name:</th>
                        <th>Month:</th>
                        <th>Salary:</th>
                        <th>Total Incentive:</th>
                        <th>Total Salary:</th>
                    </tr>
                        </thead>
                        @php
                            $i=1;
                        @endphp
                    <tbody>
                    <tr>
                        <td>{{ $i++ }}</td>
                    <td> {{ $data->name}}</td>
                    <td>
                        {{ $data->monthName ?? 'Invalid Month' }}
                    </td>
                        <td> {{ $data->salary }}</td>
                        <td>{{ $data->monthly_incentive }}</td>
                        <td> {{ $data->month_salary }}</td>

                     </tr>
                     </tbody>
             </table>




@endsection
