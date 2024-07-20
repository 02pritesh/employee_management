<?php
namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Carbon;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use  App\Models\User;
use App\Models\forget;
use App\Models\PasswordReset;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator,Redirect,Response;
class LoginController extends Controller
{
    public function login(){
        return view('auth.login');

    }
     public function login_user(Request $request){
        $request->validate([

            'email' => 'required',
            'password' => 'required',

      ]);
          $user = User::where('email',$request->email)->first();

          if($user){
            // if($user->password == $request['password']){

             if(Hash::check($request->password , $user->password)){
                if($user->user_type == 'admin'){
                    $request->Session()->put('admin', $user);
                    $request->Session()->put('username', $user->name);
                    $request->session()->put('id', $user->id);
                    $path = $user->file;
                    $request->Session()->put('profile', $path);
                  return redirect('adminuser')->with( 'success','succussfully login');
            }elseif ($user->user_type == 'emp' && $user->login_status == 'activate') {
                $request->session()->put('emp', $user);
                $request->Session()->put('username', $user->name);
                $request->session()->put('id', $user->id);
                $path = 'public/assets/uploads/img/'.$user->file;
                $request->Session()->put('file', $path);
                return redirect('Userprofile')->with('success', 'Successfully logged in');
            } else {
                return redirect('/')->with('fail', 'This account is not active or not authorized.');
                }


        } else {
            return redirect('/')->with('fail', 'Invalid password.');
        }
    } else {
        return redirect('/')->with('fail', 'Invalid email.');
    }
}


  public function password(){
    if (!session()->has('admin')) {
        return redirect('/');
    }else{
    return view('auth.forget-password');
    }
  }



  public function forgetpass(Request $request)
  {
      try {
          $user = User::where('email', $request->email)->first();

          if ($user) {
              $token = Str::random(40);


              $domain = URL::to('/');
              $url = $domain . '/reset-password?token=' . $token;
              $data['url'] = $url;
              $data['email'] = $request->email;
              $data['title'] = 'Password Reset';
              $data['body'] = 'Please click on the link below to reset your password.';

              Mail::send('auth.forgetPassword', ['data' => $data], function ($message) use ($data) {
                  $message->to($data['email'])->subject($data['title']);
              });

              $datetime = Carbon::now()->format('Y-m-d H:i:s');
                PasswordReset::updateOrCreate(
                  ['email' => $request->email],
                  [
                      'email' => $request->email,
                      'token' => $token,
                      'created_at' => $datetime
                  ]
              );


              return "Password reset link sent successfully to " . $request->email;
          } else {
              return "User not found with the provided email.";
          }
      } catch (\Exception $e) {

          return "An error occurred. Please try again later.";
      }
  }

  public function resetPassword()
  {
    if (!session()->has('admin')) {
        return redirect('/');
    }else{
      return view('auth.reset-password');
    }
  }



  public function reset_Password(Request $request)
  {
    $request->validate([
        'password' => 'required',
        'new_password' => 'required|confirmed',
    ]);


      $token = $request->token;

      $data = DB::table('password_resets')->where('token', $token)->first();

      $user = User::where('email', $data->email)->first();
      $user->password = Hash::make($request->new_password);
      $user->save();

      return redirect('/')->with('succuss','successfully password change');
  }
         public function logout(Request $request ) {
            $request->Session()->forget('loginId');
            return redirect('/')->with('success' , "logout successfully");
        // }else{
        }



        public function reset($id){
            $data = User::findOrFail($id);
            return view('user.Reset-pass',compact('data'));

        }


       public function resetPass(Request $request){
        $request->validate([
            'old_password'        =>'required',
            'new_password'         =>'required',
            'confirm_password' => 'required|same:new_password',
         ]);
          $user  = User::find($request->id);

         $user_pass = $user->password;

        if(Hash::check($request->old_password, $user_pass)){

            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect('Userprofile')->with('success','change your password successfully');

        }else{

            return redirect()->back()->with('fail', 'Old password is incorrect');
        }

       }








    }









