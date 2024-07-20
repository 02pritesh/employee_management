<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\user\EmployeeController;
use App\Models\AsignProject;
use App\Models\EmployeeDeveloper;
use Illuminate\Http\Request;
use App\Models\ProjectDetail;
use App\Models\ProjectPaymentModule;
use App\Models\User;
use App\Models\ProjectModule;
use Validator, Redirect, Response;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectTaskController extends Controller
{
    //
    public function add_project()
    {
        return view('admin.add_project');
    }
    public function add_project_detail(Request $request)
    {
        $validate = $request->validate([
            "project_name" => "required|string",
            "project_technology" => "required|string",
            "project_description" => "required",
            "project_duration" => "required|numeric",
            "project_start_date" => "required|date",
            "project_end_date" => "required|date",
            "project_cost" => "required",
            "module.*" => "required|string",
            "module_description.*" => "required|string",
        ]);

        $data = new ProjectDetail();
        $data->project_name = $request->project_name;
        $data->project_technology = $request->project_technology;
        $data->project_description = $request->project_description;
        $data->project_duration = $request->project_duration;
        $data->project_start_date = $request->project_start_date;
        $data->project_end_date = $request->project_end_date;
        $data->project_cost = $request->project_cost;
        $data->total_payment = $request->project_cost;
        $data->save();

        $projectId = $data->id;

        foreach ($request->module as $index => $module) {
            $projectModule = new ProjectModule();
            $projectModule->project_id = $projectId;
            $projectModule->module = $module;
            $projectModule->module_description = $request->module_description[$index];
            $projectModule->save();
        }

        return redirect('add-project')->with('success', "Project details added successfully!");
    }


    // public function add_project_detail(Request $request)
    // {
    //     $validate = $request->validate([
    //         "project_name" => "required|string",
    //         "project_technology" => "required|string",
    //         "project_description" => "required",
    //         "project_duration" => "required|numeric",
    //         "project_start_date" => "required|date",
    //         "project_end_date" => "required|date",
    //         "project_cost" => "required",
    //         "module" => "required|string",
    //         "module_description" => "required|string",

    //     ]);

    //     if (!$validate) {
    //         return redirect('add-project')->withErrors($validate)->withInput();
    //     } else {
    //         $data = new ProjectDetail();
    //         $data->project_name = $request->project_name;
    //         $data->project_technology = $request->project_technology;
    //         $data->project_description = $request->project_description;
    //         $data->project_duration = $request->project_duration;
    //         $data->project_start_date = $request->project_start_date;
    //         $data->project_end_date = $request->project_end_date;
    //         $data->project_cost = $request->project_cost;
    //         $result = $data->save();

    //         if ($result) {
    //             return redirect('add-project')->with('success', "Project details add successfully!");
    //         } else {
    //             return redirect('add-project')->with('fail', "Data insertion failed!");
    //         }
    //     }
    // }




    public function project_information()
    {
        $data = ProjectDetail::all();
        return view('admin.project_information', compact('data'));
    }

    public function project_status(Request $request)
    {

        $result = $request->inlineRadioOptions;

        if ($result == 'Pending') {
            $data = ProjectDetail::where('id', $request->id)->first();
            $data->project_status = 'Pending';

            $data->save();

            return redirect()->back()->with('fail', 'status Pending');
        } else {
            $data = ProjectDetail::where('id', $request->id)->first();
            $data->project_status = 'Complete';

            $data->save();
            return redirect()->back()->with('success', 'status complete');
        }
    }

    public function project_info_edit($id)
    {
        // $data = ProjectDetail::findOrFail($id);
        $data = ProjectDetail::where('id', $id)->first();

        return view('admin.project_info_edit', compact('data'));
    }

    public function project_info_update(Request $request)
    {
        // Validate the incoming request data
        $validate = $request->validate([
            "project_name" => "required|string",
            "project_technology" => "required|string",
            "project_description" => "required|string",
            "project_duration" => "required|numeric",
            "project_start_date" => "required|date",
            "project_end_date" => "required|date",
            "project_cost" => "required|string",
            // "inputs.*.project_module" => "required|string",
            // "inputs.*.project_module_description" => "required|string",
        ]);

        // Find the project detail by ID
        $data = ProjectDetail::find($request->id);
        if (!$data) {
            return redirect('project-info')->with('fail', "Project not found!")->withInput();
        }

        // Assign the validated data to the model
        $data->project_name = $request->project_name;
        $data->project_technology = $request->project_technology;
        $data->project_description = $request->project_description;
        $data->project_duration = $request->project_duration;
        $data->project_start_date = $request->project_start_date;
        $data->project_end_date = $request->project_end_date;
        $data->project_cost = $request->project_cost;
        $data->total_cost = $request->project_cost;

        // // Prepare the modules data
        // $modules = [];
        // foreach ($request->inputs as $input) {
        //     $modules[] = [
        //         'module' => $input['project_module'],
        //         'description' => $input['project_module_description']
        //     ];
        // }

        // // Ensure modules data is not empty
        // if (empty($modules)) {
        //     return redirect('project-info')->with('fail', "Modules cannot be empty!")->withInput();
        // }

        // // Encode the modules data as JSON
        // $data->project_modules = json_encode($modules);

        // Save the updated project details
        $result = $data->save();

        // Redirect with appropriate message
        if ($result) {
            return redirect('project-info')->with('success', "Project Details Updated Successfully!");
        } else {
            return redirect('project-info')->with('fail', "Project Details did not update");
        }
    }

    public function project_info_delete($id)
    {
        $result = ProjectDetail::where('id', $id)->delete();

        if ($result) {
            return redirect('project-info')->with('success', 'Project Information Delete successfully!');
        } else {
            return redirect('project-info')->with('fail', 'Project Information Deletion failed!');
        }
    }

    public function view_project_employee($id)
    {
        $employee = AsignProject::all();
        $data = ProjectDetail::where('id', $id)->get();
        $module = ProjectModule::where('project_id',$id)->get();
        return view('admin.view_project_employee', compact('data', 'employee','module'));
    }

   

    public function add_project_payment(Request $request){
        

        $project =new ProjectPaymentModule();
      
        $project->project_id = $request->project_id;
        $project->project_cost = $request->project_cost;
        $project->module_cost = $request->module_cost;
        $project->module_no = $request->module_no;
        $project->module_description = $request->module_description;
        $project->module_date = $request->module_date;
        $project->save();

        return redirect()->back()->with('success', 'Module data saved successfully.');
    }


    // ----------------------------------Add Employee Developer code--------------------------------------

    public function add_employee_developer()
    {
        return view('admin.add_employee_developer');
    }

    public function add_employee_developer_detail(Request $request)
    {
        $validate = $request->validate([
            'employee_profile' => 'required|in:frontend developer,backend developer,fullstack developer',
            'employee_project_completed' => 'required',
            'employee_technology' => 'required',
            'employee_experience_time' => 'required',
            'employee_experience' => 'required|in:fresher,experience',
        ]);

        if (!$validate) {
            return redirect('add-employee-developer')->withErrors($validate)->withInput();
        } else {

            $data = new EmployeeDeveloper();
            $username = session::get('username');
            $data->employee_name = $username;
            $data->employee_profile = $request->employee_profile;
            $data->employee_project_completed = $request->employee_project_completed;
            $data->employee_technology = $request->employee_technology;
            $data->employee_experience = $request->employee_experience;
            $data->employee_experience_time = $request->employee_experience_time;

            $result = $data->save();

            if ($result) {
                return redirect('add-employee-developer')->with('success', 'Emplyee Developer details submit successfully');
            } else {
                return redirect('add-employee-developer')->with('fail', 'Employee developer details did not submited!');
            }
        }
    }

    public function employee_developer_detail()
    {
        $data = EmployeeDeveloper::all();
        return view('admin.employee_developer_detail', compact('data'));
    }

    public function edit_employee_developer_detail($id)
    {
        $data = EmployeeDeveloper::find($id);
        return view('admin.edit_employee_developer_detail', compact('data'));
    }

    public function udate_employee_developer_detail(Request $request)
    {
        $data = EmployeeDeveloper::find($request->id);
        $username = session::get('username');
        $data->employee_name = $username;
        $data->employee_profile = $request->employee_profile;
        $data->employee_project_completed = $request->employee_project_completed;
        $data->employee_technology = $request->employee_technology;
        $data->employee_experience = $request->employee_experience;
        $data->employee_experience_time = $request->employee_experience_time;

        $result = $data->save();

        if ($result) {
            return redirect('employee-developer-detail')->with('success', 'Emplyee Developer details Update successfully');
        } else {
            return redirect('employee-developer-detail')->with('fail', 'Employee developer details did not Update!');
        }
    }

    public function delete_employee_developer_detail($id)
    {
        $data = EmployeeDeveloper::find($id);
        $result = $data->delete();
        if ($result) {
            return redirect('employee-developer-detail')->with('success', 'Employee developer details deleted successfully!');
        } else {
            return redirect('employee-developer-detail')->with('fail', 'Employee developer details did not deleted!');
        }
    }

    public function asign_project()
    {
        $data = User::all();
        $project = ProjectDetail::get();
        return view('admin.asign_project', compact('data', 'project'));
    }

    public function asign_project_employee(Request $request)
    {
        $employee_ids = $request->employee_id; // Make sure this is an array of IDs

        $check_asign = AsignProject::all();
        $project = ProjectDetail::find($request->project_id);

        $check1 = 0;
        $employee_project_count = []; // Array to count occurrences of employee IDs across projects

        foreach ($check_asign as $check) {
            $database_id = $check->project_id;
            $request_id = $project->id;

            if (($database_id == $request_id) && ($check->employee_profile == $request->employee_profile)) {
                $check1 = 1;
                $project_name = $check->project_name;
            }

            $check_employee_id = explode(',', $check->employee_id);

            // Count the occurrences of each employee ID in the current project
            foreach ($check_employee_id as $emp_id) {
                if (!isset($employee_project_count[$emp_id])) {
                    $employee_project_count[$emp_id] = 0;
                }
                $employee_project_count[$emp_id]++;
            }
        }

        // Check if any employee is assigned to more than 3 projects
        $flag = 0; // Initialize a flag variable
        foreach ($employee_ids as $employee_id) {
            if (isset($employee_project_count[$employee_id]) && $employee_project_count[$employee_id] >= 3) {
                $employee_id = (int)$employee_id;
                $flag = 1; // Set flag to indicate an employee is over-assigned
                break; // Exit the loop as soon as an over-assigned employee is found
            }
        }

        if ($check1 == 1) {
            return redirect('asign-project-detail')->with('fail', 'You have already included employee   in ' . $project_name);
        } else if ($flag == 1) {
            return redirect('asign-project-detail')->with('fail','employee_id '.$employee_id. ' are already add in three project.');
        } else {
            $usernames = [];

            foreach ($employee_ids as $id) {
                $user = User::where('id', $id)->first();

                if ($user) {
                    $usernames[] = $user->name;
                }
            }
            $data = new AsignProject();
            $input = $request->all();
            $input['employee_id'] = implode(',', $input['employee_id']);
            $data->employee_id = $input['employee_id'];
            $data->employee_name = implode(',', $usernames);
            $data->project_name = $project->project_name;
            $data->project_id   = $project->id;
            $data->employee_profile =  $request->employee_profile;

            $result = $data->save();

            if ($result) {
                return redirect('asign-project-detail')->with('success', 'Employee add in project');
            } else {
                return redirect('asign-project-detail')->with('fail', 'employee do not add in project');
            }
        }
    }





    public function asign_project_detail()
    {
        $data = AsignProject::all();
        return view('admin.asign_project_detail', compact('data'));
    }

    public function edit_asign_project_detail($id)
    {
        // In your controller method

        $data = AsignProject::where('id', $id)->first();

        $project = ProjectDetail::all();
        $user = User::all();

        return view('admin.edit_asign_project_detail', compact('project', 'data', 'user'));
    }


    public function update_asign_project_detail(Request $request)
    {
        $employee_ids = $request->employee_id; // Make sure this is an array of IDs

        $check_asign = AsignProject::all();
        $data = AsignProject::where('project_id', $request->project_id)->first();

        $project = ProjectDetail::find($request->project_id);


        $check1 = 0;
        $employee_project_count = []; // Array to count occurrences of employee IDs across projects

        foreach ($check_asign as $check) {
            $database_id = $check->project_id;
            $request_id = $project->id;

            if (($database_id == $request_id) && ($check->employee_profile == $request->employee_profile)) {
                $check1 = 1;
                $project_name = $check->project_name;
            }

            $check_employee_id = explode(',', $check->employee_id);

            // Count the occurrences of each employee ID in the current project
            foreach ($check_employee_id as $emp_id) {
                if (!isset($employee_project_count[$emp_id])) {
                    $employee_project_count[$emp_id] = 0;
                }
                $employee_project_count[$emp_id]++;
            }
        }

        // Check if any employee is assigned to more than 3 projects
        $flag = 0; // Initialize a flag variable
        foreach ($employee_ids as $employee_id) {
            if (isset($employee_project_count[$employee_id]) && $employee_project_count[$employee_id] >= 3) {
                $employee_id = (int)$employee_id;
                $flag = 1; // Set flag to indicate an employee is over-assigned
                break; // Exit the loop as soon as an over-assigned employee is found
            }
        }
        
        if ($flag == 1) {
            return redirect('asign-project-detail')->with('fail','employee_id '.$employee_id. ' you are already add in three project.');
        } else if ($check1 == 1 && $flag == 1) {
            return redirect('asign-project-detail')->with('fail', 'You have already included employee in ' . $project_name);
        }  else {
            $usernames = [];
            $employee_ids = $request->employee_id; // Make sure this is an array of IDs
            foreach ($employee_ids as $id) {
                $user = User::where('id', $id)->first();

                if ($user) {
                    $usernames[] = $user->name;
                }
            }
            $input = $request->all();
            $input['employee_id'] = implode(',', $input['employee_id']);
            $data->employee_id = $input['employee_id'];
            $data->employee_name = implode(',', $usernames);
            $data->project_name = $project->project_name;
            $data->project_id   = $project->id;
            $data->employee_profile =  $request->employee_profile;

            $result = $data->save();

            if ($result) {
                return redirect('asign-project-detail')->with('success', 'Assign project details Update successfully!');
            } else {
                return redirect('asign-project-detail')->with('fail', 'Udataion failed');
            }
        }
    }

    public function delete_asign_project_detail($id)
    {
        $data = AsignProject::find($id);
        if ($data->delete()) {
            return redirect('asign-project-detail')->with('success', 'Deleted asign project details of employee');
        } else {
            return redirect('asign-project-detail')->with('fail', 'Deletion failed of asign project detial of employee');
        }
    }
}
