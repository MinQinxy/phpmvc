<?php

namespace Vender\Helpers;

use Vender\Core\ViewLoader;
use Vender\Plugin\Vengine\Mladen;

class View{



    public static function view(string $__viewname__,array $__var__) {

        $__loader__ = selectViewTemplateLoader($__viewname__,$__var__);


    }

    public static function selectViewTemplateLoader(){
        $__template__ = trim(strtoupper(Config::app('VIEW_TEMPLATE')));
        if("DEFAULT" == $__template__){

        }
    }


}