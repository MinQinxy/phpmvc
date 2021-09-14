<?php

namespace Vender\Helpers;

use Vender\Core\ViewLoader;
use Vender\Plugin\Vengine\MladeEngine;

class View{
    public static  $LOADER_NAMES = ['DEFAULT','MLADE'];


    public static function view(string $__viewname__,array $__var__ = array()) {

        $__loader__ = View::selectViewTemplateLoader($__viewname__,$__var__);

        return 
    }

    public static function selectViewTemplateLoader(string $__viewname__, array $__var__){
        $__template__ = trim(strtoupper(Config::app('VIEW_TEMPLATE')));
        if(View::$LOADER_NAMES[0] == $__template__){
            return  new ViewLoader($__viewname__,$__var__);
        }else if(View::$LOADER_NAMES[1] == $__template__){
            return new MladeEngine($__viewname__, $__var__);
        }else{
            \Vender\Helpers\Error::error(500,"No This View Template");

        }
    }


}