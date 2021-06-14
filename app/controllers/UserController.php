<?php

namespace app\controllers;

use app\models\User;
use fw\core\base\View;
use fw\widgets\menu\Menu;

class UserController extends AppController {

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if($user->save('user')){
                $_SESSION['success'] = 'Вы успешно зарегистрированы';
            }else{
                $_SESSION['error'] = 'Ошибка! Попробуйте позже';
            }
            redirect();
        }
        View::setMeta('Регистрация');
    }

    public function _loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Вы успешно авторизованы';
            }else{
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }
            redirect();
        }
        View::setMeta('Вход');
    }

    public function loginAction(){
        // dd(password_hash('123', PASSWORD_DEFAULT));
        if (User::isAuth()) redirect('/');
        if(!empty($_POST)){
            $user = new User();
            if(!$user->login()){
                $_SESSION['error'] = 'Логин/пароль введены неверно!';
            }
            if(User::isAuth()){
                redirect();
            }else{
//                redirect();
            }
        }
        $this->layout = 'login';
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('/user/login');
    }

    public function uspevaemostAction() {

    }

    public function testAction() {

    }

}