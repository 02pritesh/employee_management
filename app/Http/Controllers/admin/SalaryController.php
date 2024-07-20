<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TestAttendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator, Redirect, Response;
use App\Models\salary;
use App\Models\User;
use App\Models\TestSalary;
use Carbon\Carbon;


class SalaryController extends Controller
{
    public function salary($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.salary-update', compact('data'));
    }
    public function salary_add(Request $request)
    {
        if ($request->filled('salary')) {
            $userData['salary'] = $request->salary;
        }

        if ($request->filled('incentive')) {
            $userData['incentive'] = $request->incentive;
        }
        if ($request->filled('percentage')) {
            $userData['percentage'] = $request->percentage;
        }

        
        User::where('id', $request->id)->update($userData);

        return redirect('employee')->with('success', ' Add Salary successfully ');

        if (!empty($userData)) {
            User::where('id', $request->id)->update($userData);
        }


    }
    public function emp_salary()
    {
        if (!session()->has('admin')) {
            return redirect('/login');
        }else{
            $data = TestSalary::orderBy('id', 'desc')->get();

            $data->transform(function ($item) {
                $parsedDate = Carbon::parse($item->date);
                $item->monthName = $parsedDate->format('F');
                $item->year = $parsedDate->year;
                return $item;

            });
            $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            return view('admin.salarypage', compact('data','monthNames'));
        }
    }








}
