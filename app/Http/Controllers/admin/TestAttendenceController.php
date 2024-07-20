<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TestAttendence;
use App\Models\TestSalary;
use App\Models\User;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestAttendenceController extends Controller
{
    //
    public function userAttendence($user_id)
    {

        $data = TestAttendence::where('user_id', $user_id)
        ->orderBy('date', 'desc')
        ->get();
         if (!session()->has('admin')) {
            return redirect('/login');
        }else{
            $data->transform(function ($item) {
                $parsedDate = Carbon::parse($item->date);
                $item->monthName = $parsedDate->format('F');
                $item->year = $parsedDate->year;
                return $item;

            });
            $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            return view('admin.attendence', compact('data', 'monthNames'));
        }
    }


    public function calculateSalary(Request $request)
    {
        $currentDate = Carbon::now()->toDateString();

        $existingSalary = TestSalary::where('user_id', $request->user_id)
            ->where('date', 'LIKE', $request->date . '%')
            ->first();
        // dd($existingSalary);
        if ($existingSalary) {
            return redirect('employee')->with('message', 'Salary already calculated for this user');
        }

        $attan = DB::table('test_month_attendence')
            ->where('user_id', $request->user_id)
            ->where('date', 'LIKE', $request->date . '%')
            ->get();

        $user = User::find($request->user_id);
        $baseSalary = $user->salary;
        $name = $user->name;

        $daysInMonth = 30;

        $attanCount = $attan->count();

        if ($attanCount < $daysInMonth) {
            return redirect('employee')->with('message', 'Attendance is not complete for the entire month');
        }


        $totalAbsent = 0;
        $totalIncentive = 0;

        foreach ($attan as $value) {
            if ($value->attendence_status == 0 || Carbon::parse($value->date)->dayOfWeek === Carbon::SUNDAY) {
                $totalAbsent += 1;
            } else {
                $totalIncentive += $value->incentive;
            }
        }
        $endDateFormatted = date('Y-m-t', strtotime($request->date));

        $daysInMonth = date('t', strtotime($request->date));

        $perDayPay = $baseSalary / $daysInMonth;
        $salary_daily = $daysInMonth - $totalAbsent;


        $salary = $perDayPay * $salary_daily;
        $totalSalary = ($baseSalary + $totalIncentive) - ($perDayPay * $totalAbsent);
        // dd($totalSalary);
        $data = new TestSalary();
        $data->user_id = $request->user_id;
        $data->month_salary = $totalSalary;
        $data->monthly_incentive = $totalIncentive;
        $data->salary = $salary;
        $data->name = $name;
        $data->date = $attan->isEmpty() ? $endDateFormatted : $attan->first()->date;

        $data->save();

        return view('admin.salary_update', compact('data'));
    }




    public function test_data($user_id)
    {

        $attendances = DB::select("SELECT * FROM test_month_attendence WHERE user_id = '$user_id';");


        return view('test-data', compact('attendances'));
    }



    public function store_us($user_id)
    {
        $data = TestAttendence::where('user_id', $user_id)->get();
        // dd($data);
            return view('admin.Attandance',compact('data'));


    }
    public function update_status(Request $request){
        $attendances = TestAttendence::find($request->id);

    }








}
