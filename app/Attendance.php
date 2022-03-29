<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $dates = ['attend_time', 'leave_time'];
    
    public function getWorkingMinutesAttribute()
    {
        return $this->leave_time && $this->attend_time ? $this->leave_time->diffInMinutes($this->attend_time) : 0;
        
        // if($this->leave_time && $this->attend_time){
        //  return $this->leave_time->diffInMinutes($this->attend_time);
        // }else{
        //  return 0;
        // };
        
        //&&：かつ
        
        
    }
}
