<?php

namespace app\controllers;
use app\models\User;
use fw\core\App;
use fw\widgets\language\Language;

/**
 * Description of App
 *
 */
class AppController extends \fw\core\base\Controller{
    
    public $menu;
    public $meta = [];
    public $layout = 'hanty';

    public $msg;
    public $usr;
    public $cur_user;
    public $doc;
    public $access;
    public $data;
    public $errors = [];
    public $sem;
    public $course;
    public $events;
    public $vkr_list = [];
    public $vkr_ids = [];
    
    public function __construct($route) {
        parent::__construct($route);

        if(!User::isAuth() && $route['action'] != 'login'){
            redirect('/user/login');
        }
        new \app\models\Main;
//        App::$app->setProperty('langs', Language::getLanguages());
//        App::$app->setProperty('lang', Language::getLanguage(App::$app->getProperty('langs')));
        //debug(App::$app->getProperties());

        $this->usr = new User();
        $this->cur_user = \R::load('user',1);
        $this->access = 1;
    }
    
    protected function setMeta($title = '', $desc = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
    
}
