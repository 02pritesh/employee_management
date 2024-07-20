<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DateTime;
use App\Models\User;
use App\Models\holiday;
use App\Models\Demo;
use App\Models\leave;
use Session,Validator;
use App\Http\Requests\AttendanceEmp;
use Illuminate\Support\Facades\Hash;
use App\Models\event;
class LeaveController extends Controller
{

        public function Event_user(){
            if (!session()->has('emp')) {
                return redirect('/login');
            }else{
            $data = event::orderBy('id', 'desc')->get();
          return view('user.event',compact('data'));
            }
        }
        public function leave(){
            $id = session()->get('id');
            $data = leave::where('user_id',$id)->get();
            $id = session()->get('id');
               $name = session()->get('username');
         return view('user.leave',compact('data','id','name'));
        }


        public function leave_app(Request $request){
            $id = session()->get('id');
            $name = session()->get('username');

            $validate = Validator::make($request->all(),[
                "subject" => "required",
                "reason" => "required",
                "start_date" => "required|date",
                "end_date" => "required|date"
            ]);

            if($validate->fails())
            {
                return redirect('leave')->withErrors($validate)->withInput();
            }
            else{

                $leave = new leave();
                $leave->name=$name;
                $leave->subject=$request['subject'];
                $leave->reason=$request['reason'];
                $leave->start_date =$request['start_date'];
                $leave->end_date =$request['end_date'];
                $leave->user_id = $id;
                $request= $leave->save();
                //  dd($request);


                if($request){
                    return redirect('leave')->with('success','leave sent to admin');
                }else{
                    return back()-> with('fail','please try again');
                }
            }

       }
   public function holiday(){
    if (!session()->has('emp')) {
        return redirect('/login');
    }else{
    $data = Holiday::orderBy('id', 'desc')->get();
   return view('user.holiday', compact('data'));
    }
 }
 public function notification()
 {
     $data = Demo::orderBy('id', 'desc')->get();

     return view('user.notification', compact('data'));
 }

 public function notification_delete($id)
 {
     $demo = Demo::find($id);

     
     if ($demo) {
         $demo->delete();
        return redirect('notification')->with('success',"Notification deleted Successfully!");
     } else {
        return redirect('notification')->with('fail',"NOtification deletion failed!");
     }

     
 }


    }


