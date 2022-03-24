<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use Carbon\Carbon;
use Auth;

class AttendanceController extends Controller
{
    public function add(){
        return view('top');
    }
    
    public function attend(){
        $attendance = new Attendance;
        $attendance->attende_time = Carbon::now();
        $attendance->user_id = Auth::id();
        $attendance->save();
        
        return redirect()->back();
    }
    
    public function leave(){
        $leave = Attendance::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first(); 
        $leave->leave_time = Carbon::now();
        $leave->save();
        return redirect()->back();
    }
    
}
