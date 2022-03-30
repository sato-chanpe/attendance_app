<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Attendance;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $attendances = Attendance::orderBy('attend_time')->get();
        $year_selections = range($attendances->first()->attend_time->year, $attendances->last()->attend_time->year);
        $displayed_year = $request->year ? $request->year : Carbon::now()->year;
        return view('admin.user.index', compact('users', 'year_selections', 'displayed_year'));
    }
    
    public function showMonthly(User $user, Request $request)
    {
        $y = $request->y;
        $m = $request->m;
        $attendances = $user->attendances()->whereYear('attend_time', '=', $y)->whereMonth('attend_time', '=', $m)->get();
        return view('admin.user.show_monthly', compact('user', 'attendances', 'y', 'm'));
    }
}