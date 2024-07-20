<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;
use App\Models\Demo;
use Validate;


class FunctionController extends Controller
{
    public function Event_admin()
    {
        if (!session()->has('admin')) {
            return redirect('/login');
        } else {
            $data = event::orderBy('id', 'desc')->get();
            return view('admin.event', compact('data'));
        }
    }
    public function Event(Request $request)
    {
        $validate = $request->validate([
            'type' => "required",
            'description' => "required",
            'start_date' => "required|date",
            'time' => "required|time",
            'end_time' => "required|time"
        ]);

        if ($validate) {
            return redirect('function')->withErrors($validate)->withInput();
        } else {

            $event = new event();
            $event->type = $request['type'];
            $event->description = $request['description'];
            $event->start_date = $request['start_date'];
            $event->time = $request['time'];
            $event->end_time = $request['end_time'];


            if ($event->time >= $event->end_time) {
                return redirect('function')->with('fail', 'End time must be greater than start time.');
            }
            $req = $event->save();
            if ($req) {
                return redirect('function')->with('success', ' event add succussfully');
            } else {
                return redirect('function')->with('fail', 'try again');
            }
        }
    }

    public function event_update($id)
    {
        $data = event::findOrFail($id);

        return view('admin.event-update', compact('data'));
    }
    public function Event_up(Request $request)
    {

        $event = event::where('id', $request->id);
        $userData = [];
        if ($request->filled('type')) {
            $userData['type'] = $request->type;
        }
        if ($request->filled('description')) {
            $userData['description'] = $request->description;
        }
        if ($request->filled('time')) {
            $userData['time'] = $request->time;
        }
        if ($request->filled('end_time')) {
            $userData['end_time'] = $request->end_time;
        }
        if ($request->filled('start_date')) {
            $userData['start_date'] = $request->start_date;
        }
        event::where('id', $request->id)->update($userData);
        return redirect('function')->with('success', 'Event Update Successfully');
    }
    public function delete($id)
    {
        event::where('id', $id)->delete();
        return redirect()->back()->with('success', ' event delete Successfully');
    }

    public function delete_del($id)
    {

        $del = Demo::where('id', $id);
        $del->delete();
        return redirect()->back()->with('success', 'delete Successfully');
    }
    public function notification()
    {
        if (!session()->has('admin')) {
            return redirect('/login');
        } else {
            $data = Demo::orderBy('id', 'desc')->get();
            return view('admin.notification', compact('data'));
        }
    }
    public function notice(Request $request)
    {
        $validate = $request->validate([
            'type' => "required",
            'content' => "required"
        ]);

        if (!$validate) {
            return redirect('Notification')->withErrors($validate)->withInput();
        } else {
            $event = new Demo();

            $event->type = $request['type'];
            $event->content = $request['content'];
            $req = $event->save();
            if ($req) {
                return redirect('Notification')->with('success', 'Notification Add succussfully');
            } else {
                return redirect('Notification')->with('fail', 'try again');
            }
        }
    }
    public function notification_edit($id)
    {
        if (!session()->has('admin')) {
            return redirect('/login');
        } else {
            $data = Demo::findOrFail($id);

            return view('admin.notification-update', compact('data'));
        }
    }

    public function notification_up(Request $request)
    {
        $event = Demo::where('id', $request->id);
        $userData = [];
        if ($request->filled('type')) {
            $userData['type'] = $request->type;
        }
        if ($request->filled('content')) {
            $userData['content'] = $request->content;
        }
        Demo::where('id', $request->id)->update($userData);

        return redirect('Notification')->with('success', 'Notification update successfully');
    }
    public function notice_del(Request $request)
    {
        $demo = Demo::find($request->id);
        $result = $demo->delete();
        return response()->json(['data' => 'soft delete successfully', $result]);
    }
}
