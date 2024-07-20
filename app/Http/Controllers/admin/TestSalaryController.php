<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\attandence;
use App\Models\TestAttendence;

class TestSalaryController extends Controller
{
    public function incentive(Request $request){
       
        $user = User::where('id', $request->user_id)->first();
        $total_incentive = $user->incentive;
        $per = $user->percentage;
         $daily_incentive = ($total_incentive*$per)/100;
         $attan = TestAttendence::where('date', $request->date)
         ->where('user_id', $request->user_id)
         ->get();
        
        $totalAbsent = 0;
        $totalIncentive = 0;
        $totalPresent = 0;
        foreach ($attan as $value) {
            if($value->attendence_status == 0||$value->attendence_status==2){
            $totalAbsent += 1;
            $incentive = 0;
           }else{
             $totalPresent+=1;
             $incentive = $daily_incentive;
            }
            $totalIncentive += $incentive;
}
    
    $data = TestAttendence::where('user_id', $request->user_id)
                       ->where('date', $request->date)
                       ->update([
                            'incentive' => $totalIncentive,
                            'percentage'=>$per,
                            
                        ]);
                        $data = TestAttendence::where('user_id', $request->user_id)
                        ->where('date', $request->date)
                        ->first();
            // dd($totalIncentive,$request->date );
            return view('admin.test' )->with(compact('data'));


}

}


