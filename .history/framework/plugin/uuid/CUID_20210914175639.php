<?php
namespace Vender\Plugin\Uuid;

class CUID{


    public static function uuid(){
        $chars = md5(unique(mt_rand(),true));

    }

}
