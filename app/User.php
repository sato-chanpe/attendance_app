<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getMonthlyTotalWorkingMinutes($year, $month)
    {
        $minutes = 0;
        foreach ($this->attendances()->whereYear('attend_time', '=', $year)->whereMonth('attend_time', '=', $month)->get() as $attend) {
            $minutes += $attend->working_minutes;
        }
        return $minutes;
    }

    
    public static $rules = array(
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    );
    
    public function isAdmin(){
        return $this->role == 1;
        //roleが1かどうかを判断。role=1ならTrueを返す
        
        //if($this->role == 1){
        //    return true;
        //}else{
        //    return false;
        //}   …と同じ
    }
    
    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }
}
