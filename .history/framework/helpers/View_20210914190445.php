<?php

namespace Vender\Helpers;

use Vender\Core\ViewLoader;
use Vender\Plugin\Vengine\Mladen;

class View{



    public static function view(){
        


    }

    public static function selectViewTemplate(){
        $__template__ = trim(strtoupper(Config::app('VIEW_TEMPLATE')));
        if("DEFAULT" == $__template__){

        }
    }


}