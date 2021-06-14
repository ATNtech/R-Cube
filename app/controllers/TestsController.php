<?php


namespace app\controllers;

use fw\core\base\View;

class TestsController extends AppController {

    public function __construct($route)
    {
        parent::__construct($route);

        $title = '';
        $my_id = $uid = $_SESSION['user']['id'];
        $user = $cur_user = \R::load('user', $_SESSION['user']['id']);
        View::setMeta('', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'user', 'my_id', 'uid', 'cur_user'));
    }

    public function indexAction() {
        $data = $this->data;
        $this->setMeta('Тестирование');
        $data['menu'] = $this->menu;
        $data['meta'] = $this->meta;

        $this->set($data);
    }
}