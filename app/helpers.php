<?php declare(strict_types=1);

if (! function_exists('getFormatedDatetimeFromMinutes')) {
     /**
      * @return string
      */
     function getFormatedDatetimeFromMinutes($minute): string
    {
        $h = floor($minute / 60);
        $m = ($minute % 60) / config('app.duration') * 0.25; //15m=0.25h
        return $h + $m . "h";
    }
 }