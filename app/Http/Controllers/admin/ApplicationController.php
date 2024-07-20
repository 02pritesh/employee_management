<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leave;
use App\Models\TestAttendence;
use Validator,Redirect,Response;
use Mail;
class ApplicationController extends Controller
{
    public function update($id)
    {
        $data = leave::where('id', $id)->first();
        if (!session()->has('admin')) {
            return redirect('/login');
        } else {
            return view('admin.leave-update', compact('data'));
        }
    }
    public function update_status(Request $request)
    {
        $data = leave::where('user_id', $request->user_id)->where('start_date' , $request->start_date)->first();
        $userAttendance = TestAttendence::where('user_id', $request->user_id)
        ->first();
        if ($data && ($request->status === 'Approved' || $request->status === 'reject')) {
            $data->status = $request->status;
            $data->save();
            // dd($request->status);
        }
        if ($request->status === 'Approved') {
            $userAttendance = new TestAttendence();
            $userAttendance->user_id = $request->user_id;
            $userAttendance->date = $request->start_date;
            $userAttendance->save();
        
        dd($userAttendance);
    }
          return redirect('leave-application')->with('success', 'Employee leave status update successfully ');
    }
     public function leave(){

        if (!session()->has('admin')) {
            return redirect('/login');
        }else{
            $data = leave::orderBy('id', 'desc')->get();

            return view('admin.leave',compact('data'));
        }
      }




}
