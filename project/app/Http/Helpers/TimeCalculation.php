<?php

namespace App\Http\Helpers;

class TimeCalculation
{
/**
 * I thought I was going to use this in the Component controller as well,
 * so I broke this out of the User controller to a generalized helper. As
 * it turns out, Eloquent can build some decent queries so it wasn't needed.
 * That said, I still think it's cleaner and more correct to leave this as
 * a herlper method than a specific user controller method, so I'm not
 * reverting the change.
 *
 * @param [type] $logs
 * @return void
 */
  public function calculateTime($logs)
    {
        $totalTime = 0;
        foreach($logs as $log){
            $totalTime += $log->seconds_logged;
        }
        return $totalTime;
    }
}
