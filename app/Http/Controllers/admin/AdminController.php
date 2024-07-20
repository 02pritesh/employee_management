<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\leave;
use App\Models\salary;
use App\Models\forget;
use App\Models\TestAttendence;
use Illuminate\Support\Facades\Hash;
use App\Models\holiday;
use App\Models\ProjectDetail;
use Validator, Redirect, Response;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function Admin_user()
{
    if (!session()->has('admin')) {
        return redirect('/login');
    } else {
        $data = User::where('user_type', 'emp')->orderBy('id', 'desc')->get();

        return view('admin.dashboard', compact('data'));
    }
}

    public function register_userr()
    {
        if (!session()->has('admin')) {
            return redirect('/login');
        } else {
            $data = User::get();
            return view('admin.register', compact('data'));
        }
    }
    public function register_user(Request $request)
    {
           $validate = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:8',
             'name'     => 'required',
             'city'     => 'required',
             'phone' =>'required|min:10',
             'profile' => 'required|in:frontend developer,backend developer,fullstack developer',
             'experience'=> 'required|in:fresher,experience',
             'technology' => 'required',

        ]); 

        

        if(!$validate){
            return redirect('register')->withErrors($validate)->withInput();
        }
        // -----save data in database----->
        $User = new User();


        $request->session()->put('user_id','$user->id');
        
        $User->name = $request['name'];
        $User->city = $request['city'];
        $User->phone = $request['phone'];
        $User->email = $request['email'];
        $User->profile = $request['profile'];
        $User->technology = $request['technology'];
        $User->experience = $request['experience'];
        $User->password = Hash::make($request['password']);
        $req = $User->save();

         
        
        if ($req) {
            
            return redirect('register')->with('success', 'employee register successfully!');

        } else {
            return redirect('register')->with('fail', 'try again');
        }

    }
    public function register_update(Request $request)
    {
        $validate = $request->validate([
            'name'     => 'required',
             'city'     => 'required',
             'profile' => 'required|in:frontend developer,backend developer,fullstack developer',
             'experience'=> 'required|in:fresher,experience',
             'technology' => 'required',
        ]);

        if(!$validate)
        {
            return redirect('register_update')->withErrors($validate)->withInputs();
        }
        else{
            if ($request->filled('name')) {
                $userData['name'] = $request->name;
            }
    
            if ($request->filled('email')) {
                $userData['email'] = $request->email;
            }
            if ($request->filled('city')) {
                $userData['city'] = $request->city;
            }
            if ($request->filled('profile') && $request->filled('technology') && $request->filled('experience')) {
                $userData['profile'] = $request->profile;
                $userData['technology'] = $request->technology;
                $userData['experience'] = $request->experience;
            }
            User::where('id', $request->id)->update($userData);
    
            return redirect('employee')->with('success', 'Employee data updated successfully');
    
            if (!empty($userData)) {
                User::where('id', $request->id)->update($userData);
            }
        }



    }
    public function register_up($id)
    {
        $data = User::where('id', $id)->first();
        if (!session()->has('admin')) {
            return redirect('/login');
        } else {
            return view('admin.register_update', compact('data'));
        }
    }


    public function deleteStudent($id)
    {
        User::where('id', "=", $id)->delete();
        return redirect()->back()->with('success', 'employee data deleted Successfully');

    }

    public function holidays()
    {
        $data = Holiday::orderBy('id', 'desc')->get();
        if (!session()->has('admin')) {
            return redirect('/login');
        } else {
            return view('admin.holiday', compact('data'));
        }
    }

    public function holiday_add(Request $request)
    {
        $validate = $request->validate([
            'name' => "required",
            'date' => "required",
            'description' => "required"
        ]);

        $holiday = new Holiday();
        $holiday->name = $request['name'];
        $holiday->date = $request['date'];
        $holiday->description = $request['description'];
        $holiday->attendence = 1;
        $req = $holiday->save();
        if ($req) {
            $users = User::all();
            foreach ($users as $user) {
                $attendance = TestAttendence::where('user_id', $user->id)
                ->where('date', $request['date'])
                ->first();
                if (!$attendance) {
                    $attendance = new TestAttendence();
                    $attendance->date = $request['date'];
                    $attendance->user_id = $user->id;

                    $attendance->attendence_status = $holiday->attendence;
                    $attendance->save();
                } else {
                    $attendance->attendence_status = 1;
                    $attendance->save();
                }
            }
        }
        return redirect('holidays')->with('success','Holiday Add successfully');
    }
    public function holiday_del($id)
    {
        holiday::where('id', "=", $id)->delete();
        return redirect('holidays')->with('success', ' delete Successfully');

    }

    public function holiday_update($id)
    {
        $data = holiday::findOrFail($id);
        if (!session()->has('admin')) {
            return redirect('/login');
        } else {
            return view('admin.holiday-update', compact('data'));
        }
    }

    public function holiday_up(Request $request)
    {
        $event = holiday::where('id', $request->id);
        $userData = [];
        if ($request->filled('name')) {
            $userData['name'] = $request->name;
        }
        if ($request->filled('description')) {
            $userData['description'] = $request->description;
        }
        if ($request->filled('date')) {
            $userData['date'] = $request->date;
        }

        holiday::where('id', $request->id)->update($userData);

        return redirect('holidays')->with('success', 'Holiday Update successfully');
    }
public function employee()
{
    if (!session()->has('admin')) {
        return redirect('/login');
    }

    $data = User::where('user_type', 'emp')->get();
    

    return view('admin.employee', compact('data'));
}



    public function profile_up(Request $request)
    {

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

                return redirect('employee')->with(' success', 'profile updated successfully');

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
            return redirect('employee')->with(' success', 'profile updated successfully');

            // return response()->json([
            //     'result' => true,
            //     'data' => 'Profile updated successfully',
            // ], 200);



        }
    }
    public function profile($id)
    {
        if (!session()->has('admin')) {
            return redirect('/login');
        } else {
            $data = User::findOrFail($id);
            return view('admin.profile', compact('data'));
        }
    }


    public function status($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Employee not found.'], 404);
        }

        // Toggle the login status
        $user->login_status = $user->login_status === 'deactivate' ? 'activate' : 'deactivate';
        $user->save();

        return response()->json(['success' => true, 'message' => 'Employee status has been updated.', 'new_status' => $user->login_status]);
    }

}
