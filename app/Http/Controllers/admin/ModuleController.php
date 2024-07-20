<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\ProjectDetail;
use App\Models\ProjectModule;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModuleController extends Controller
{
    public function module($id){
        $modules = ProjectModule::where('project_id',$id)->get();
        return view('admin.module', compact('modules'));
    }
    

    public function project_payment($id) {
        $data = ProjectModule::where('id', $id)->first();
        
        if (!$data) {
            return redirect()->back()->with('fail', 'Project module not found.');
        }
        
        return view('admin.project_payment', compact('data'));
    }
    

    public function module_update(Request $request) {

        $validate = $request->validate([
            'module_date' => 'required|date',
            'module_installment' => 'required|numeric',
        ]);

      
        $data = ProjectModule::where('id', $request->id)->first();
        $projectDetail = ProjectDetail::where('id', $data->project_id)->first();
        
        $project_cost = (int)($projectDetail->project_cost);
        $total = (int)($projectDetail->total_payment);
        $module_installment = (int)($request->module_installment);

        $item = ProjectModule::where('project_id', $data->project_id)->get();
        
        $count_module = 0;
        $remain = 0;
        
        foreach ($item as $i) {
            if ($projectDetail->id == $data->project_id) {
                $count_module = $i->module;
                
            }
        }
        
       
        // if($validate){
        //     return redirect('module/project-payment/'.$data->id)->withErrors($validate)->withInput();
        // }else{
            
            if ($data) {
                if($module_installment > $project_cost){

                    return redirect('project-info/module/'.$data->project_id)->with('fail','You enter high amount as compare to project deals. Project deals amount are : '. $project_cost .' .');

                }else if($project_cost > $module_installment && $count_module > $data->module )
                {
                    $remain = $project_cost - $module_installment;
                    
                    $data->module_installment = $module_installment;
                    $data->date = $request->module_date;
                    $data->module_description = $request->module_description;

                    ProjectDetail::where('id', $data->project_id)->update(['project_cost' => $remain]);


                    $data->save();
            
                    return redirect('project-info/module/'.$data->project_id)->with('success', 'Module updated successfully!  Remaining amount for next model is '.$remain);

                }else if($count_module == $data->module){

                    
                    if( $count_module == $data->module && $project_cost == $module_installment){
                        $remain = 0;
                       
                        $data->module_installment = $project_cost;
                        $data->date = $request->module_date;
                        $data->module_description = $request->module_description;
                        
                        ProjectDetail::where('id', $data->project_id)->update(['project_cost' => $remain]);
                        $data->save();
                
                        return redirect('project-info/module/'.$data->project_id)->with('success', 'Module updated successfully!  Remaining amount of model is '.$remain);

                    }else{
                        
                        return redirect('project-info/module/'.$data->project_id)->with('fail','You enter much amount as your remaining amount is '.$project_cost .' .');
                    }
                    
                }else{
                    dd($count_module,$data->module);
                    return redirect('project-info/module/'.$data->project_id)->with('fail','You enter much amount as your remaining amount is '.$project_cost .' .');
                }
                
            } else {
                return redirect('project-info/module/'.$data->project_id)->with('fail', 'Module not found for the given project.');
            }
    }

    // public function edit_module($id){
    //     $module = ProjectModule::find($id);
    //     return view('admin.edit_module',compact('module'));
    // }
    
    
}
