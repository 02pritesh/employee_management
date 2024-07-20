<?php
namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\DB;
use App\Models\Demo;
use App\Models\salary;
use App\Models\TestAttendence;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Carbon;
use Session;
use Validator, Redirect, Response;

class AttandanceController extends Controller
{
    public function attandence()
    {
        if (!session()->has('emp')) {
            return redirect('/login');
        }else{
            $name = session()->get('username');
            $currentDate = now()->toDateString();

            return view('user.attandence', compact('name', 'currentDate'));
        }
        }

        public function attandence_submit(Request $request)
        {
            // $validate = $request->validate([    
            //     'attendence_status' => "required"
            // ]);

            // if($validate)
            // {
            //     return redirect('attandence')->withErrors($validate)->withInput();
            // }

            $id = session()->get('id');
            $name = session()->get('username');
            $currentDate = Carbon::now()->toDateString();

            $attan = TestAttendence::where('user_id', $id)
                ->where('date', $request->date)
                ->first();

            // Parse the submitted date
            $submittedDate = Carbon::parse($request->input('date'));

            // Check if the submitted date is a Sunday
            if ($submittedDate->dayOfWeek === Carbon::SUNDAY) {
                $attendanceStatus = 1; // Set attendance status to 1 for Sundays
            } else {
                $attendanceStatus = $request->input('attendence_status'); // Use the submitted status for other days
            }

            if ($attan) {
                return redirect('attandence')->with('fail', 'Attendance already submitted for this date.');
            }

            $newAttendance = new TestAttendence();
            $newAttendance->name = $name;
            $newAttendance->user_id = $id;
            $newAttendance->attendence_status = $attendanceStatus; // Use the calculated attendance status
            $newAttendance->date = $request->input('date');
            $saved = $newAttendance->save();

            

            if ($saved) {
                return redirect('attandence')->with('success', 'Attendance submitted successfully.');
            } else {
                return back()->with('fail', 'Please try again.');
            }
        }


    public function attandence_show()
    {
        $id = session()->get('id');
        $data = TestAttendence::where('user_id', $id)->get();
        return view('user.showattandence', compact('data'));
    }
    public function test_data($user_id, $month)
    {
        switch ($month) {
            case 1:
            case 2:
            case 3:
                $attendances = DB::select("SELECT * FROM test_month_attendence WHERE user_id = '$user_id' AND month = '$month';");
                break;
            default:
                $attendances = [];
                break;
        }
        return view('user.test-data', compact('attendances'));
    }

}
