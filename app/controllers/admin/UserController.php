<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 10.06.2017
 * Time: 13:22
 */

namespace app\controllers\admin;

use app\models\User;
use fw\core\base\View;

class UserController extends AppController{

//    public $layout = 'default';

    public function indexAction(){
        View::setMeta('Админка :: Главная страница', 'Описание админки', 'Ключевики админки');
        $test = 'Тестовая переменная';
        $data = ['test', '2'];
        /*$this->set([
            'test' => $test,
            'data' => $data,
        ]);*/
        $this->set(compact('test', 'data'));
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if(!$user->login(true)){
                $_SESSION['error'] = 'Логин/пароль введены неверно!';
            }
            if(User::isAdmin()){
                redirect(ADMIN);
            }else{
                redirect();
            }
        }
        $this->layout = 'login';
    }

}