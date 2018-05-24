<?php

namespace Kiwi\View\Helper;

use Kiwi\View\Helper;

class TimeHelper extends Helper{
    
    public function convert($time){
        $minute = $time / 60;
        $minute = $heure = round($minute, 0, PHP_ROUND_HALF_UP); 
        if($minute > 60){
            $heure = $minute / 60;
            $heure = round($heure, 0, PHP_ROUND_HALF_UP); 
            $minute = $minute - ($heure * 60);
            $time = $heure . " h " . $minute . ' min';
        }else{
            $time = $minute . ' min';
        }
        return $time;
    }

}


?>