<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 10.06.2017
 * Time: 13:22
 */

namespace app\controllers\admin;


class TestController extends AppController{

    public function indexAction(){
        echo __METHOD__;
    }

    public function testAction(){
        echo __METHOD__;
    }

}