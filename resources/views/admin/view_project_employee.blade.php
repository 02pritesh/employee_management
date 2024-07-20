@extends('admin.main.main')

@section('admin-content')
    <h4 class="text-center mb-4">Asign Project</h4>
    <table class="table table-striped table-responsive">

        <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Project Name</th>
                <th scope="col">Frontend Developer</th>
                <th scope="col">Backend Developer</th>
            </tr>
        </thead>

        <tbody>
            @php
                $i = 1;
            @endphp

            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $item['project_name'] }}</td>
                    <td>
                        @foreach ($employee as $emp)
                            @if ($item['id'] == $emp['project_id'] && $emp['employee_profile'] == 'frontend developer')
                                {{ $emp['employee_name'] . ' , ' }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($employee as $emp)
                            @if ($item['id'] == $emp['project_id'] && $emp['employee_profile'] == 'backend developer')
                                {{ $emp['employee_name'] . ' , ' }}
                            @endif
                        @endforeach
                    </td>

                </tr>
            @endforeach
            {{-- @foreach ($data as $item)
 
        @endforeach --}}
        </tbody>
    </table>
@endsection
