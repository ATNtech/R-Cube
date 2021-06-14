<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 18.03.2017
 * Time: 15:12
 */

namespace fw\core;


trait TSingletone{

    protected static $instance;

    public static function instance() {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
    
}