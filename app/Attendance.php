<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $dates = ['attend_time', 'leave_time'];
    
    public function getWorkingMinutesAttribute()
    {
        $working_minutes = $this->leave_time && $this->attend_time ? $this->leave_time->diffInMinutes($this->attend_time) : 0;
        if($working_minutes > 0){
            $working_minutes = $working_minutes - $working_minutes % config('app.duration');
            
        }
        return $working_minutes;
    }
}
