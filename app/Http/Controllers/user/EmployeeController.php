<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\TestSalary;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\event;
use App\Models\holiday;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Schedule;
use App\Http\Requests\EmployeeRec;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
class EmployeeController extends Controller
{

    // public function index()
    // {
    //     // return "hello";
    //  return view('user.employee');
    // }
    public function dashboard(){
        if (!session()->has('emp')) {
            return redirect('/login');
        }else{
        $data = Holiday::orderBy('id', 'desc')->get();
            // dd($data);
    return view('user.dashboard', compact('data'));
        }
    }

    public function Userprofile(){

        $id = session()->get('id');
        $data = User::find($id);
            return view('user.profile', compact('data'));
        }
            // return redirect()->route('login');



    public function profile_update($id)
    {
        $data = User::findOrFail($id);
             return view('user.profile-update', compact('data'));

        }


    public function profile_up(Request $request){

        if ($request->hasFile('file')) {
            $image = $request->file('file');

            if (!empty($image)) {
                $original = $image->getClientOriginalName();
                $filename = $original;
                $image->move(public_path('public/assets/uploads/img/'), $filename);

                $userData = [
                    'file' => $filename,
                ];

                if ($request->filled('phone')) {
                    $userData['phone'] = $request->phone;
                }

                if ($request->filled('address')) {
                    $userData['address'] = $request->address;
                }

                User::where('id', $request->id)->update($userData);
                session()->put('file', 'public/assets/uploads/img/' . $filename);

                return redirect('Userprofile')->with(' success','profile updated successfully');

                // return response()->json([
                //     'result' => true,
                //     'data' => 'Profile updated successfully',
                // ], 200);
            } else {
                return response()->json([
                    'result' => false,
                    'data' => 'Image not found',
                ]);
            }
        } else {
            $userData = [];

            if ($request->filled('phone')) {
                $userData['phone'] = $request->phone;
            }

            if ($request->filled('address')) {
                $userData['address'] = $request->address;
            }

            if (!empty($userData)) {
                User::where('id', $request->id)->update($userData);
            }
            return redirect('Userprofile')->with(' success','profile updated successfully');



    }

}

 public function salary(){
    $id = session()->get('id');
    $data = TestSalary::where('user_id',$id)->get();

    $data->transform(function ($item) {
        $parsedDate = Carbon::parse($item->date);
        $item->monthName = $parsedDate->format('F');
        $item->year = $parsedDate->year;
        return $item;

    });

    $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    return view('user.salarypage', compact('data','monthNames'));
 }


}
