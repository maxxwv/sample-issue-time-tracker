<?php

namespace App\Http\Helpers;

class TimeCalculation
{
  public function calculateTime($logs)
    {
        $totalTime = 0;
        foreach($logs as $log){
            $totalTime += $log->seconds_logged;
        }
        return $totalTime;
    }
}
