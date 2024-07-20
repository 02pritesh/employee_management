@extends('user.main.main')

@section('user-content')
    <h3>Dashboard</h3>
    <div class=" container table-responsive pt-3">
        <table class="table table-bordered " id="myTable">
            <thead>
                <tr class="table-danger">


                    <th>S.No.</th>
                    <th>Name</th>
                    <th> Month</th>
                    <th>Salary </th>
                    <th> Incentive</th>
                    <th> Total Salary</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($data as $emp)
                    <tr class="table-info">
                        <td>{{ $i++ }}</td>

                        <td>{{ $emp->name }}</td>

                        <td>
                            {{ $emp->monthName ?? 'Invalid Month' }}
                        </td>

                        <td>{{ $emp->salary }}</td>
                        <td> {{ $emp->monthly_incentive }} </td>
                        <td>{{ $emp->month_salary }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
