<?php

namespace app\controllers;

use app\models\Main;
use app\models\User;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use fw\libs\Cache;
use MonkeyLearn\Client;

use LittleYoutube\LittleYoutube;

/**
 * Description of Main
 *
 */
class MainController extends AppController
{

    public function __construct($route)
    {
        parent::__construct($route);

        $title = '';
        $my_id = $uid = $_SESSION['user']['id'];
        $route = $this->route;
        $user = $cur_user = \R::load('user', $_SESSION['user']['id']);
        View::setMeta('', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'user', 'my_id', 'uid', 'cur_user', 'route'));
    }

    public function indexAction()
    {
        // $this->view = 'profile';
        $title = '';
        $my_id = $uid = $_SESSION['user']['id'];
        $route = $this->route;
        $user = $cur_user = \R::load('user', $_SESSION['user']['id']);
        View::setMeta('', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'user', 'my_id', 'uid', 'cur_user', 'route'));
    }

    public function docsnextAction()
    {
    }

    public function profileAction()
    {
        if (!isset($_GET['id'])) die;
        $embed_id = isset($_GET['id']) ? $_GET['id'] : null;
        $res = [];
        $file = 'Java_Full_Stack_Developer_Resume_Java_Full_Stack_Developer_Profile_Java_Developer_Resumes_-_English_auto.srt';
        if ($embed_id == 'NFBmlewLt8w') {
            $file = 'Java_Full_Stack_Developer_Resume_Java_Full_Stack_Developer_Profile_Java_Developer_Resumes_-_English_auto.srt';
        } elseif ($embed_id == 'OmApr4hAm1A') {
            $file = 'AWS_Resume_Java_Developer_Resume_Java_Programmer_Profile_J2EE_Resume_Web_Developer_Resume_-_English_auto.srt';
        } elseif ($embed_id == 'oJPNMOisyCw') {
            $file = 'NET_Developer_Resume_DOT_Net_Developer_Profile_NET_Architect_Resume_USA_-_English_auto.srt';
        }
        elseif ($embed_id == 'vac_43696650.json') { $file = 'vac_43696650.json'; }
        elseif ($embed_id == 'vac_43154949.json') { $file = 'vac_43154949.json'; }
        elseif ($embed_id == 'vac_40295452.json') { $file = 'vac_40295452.json'; }
        
        $file_content = file_get_contents(WWW.'/awork/'.$file);
        
        $cache = new Cache();
        if(!$res = $cache->get(md5($file))) {
            $ml = new Client('e2f52c54e422b987e8d72da5e26655ed5dc11930');
            $data = [$file_content];
            $model_id = 'ex_YCya9nrn';
            $res = $ml->extractors->extract($model_id, $data);
            $cache->set(md5($file), $res, 3600*24*5);
        }
        $res = $res->result[0];
        $tags = [];
        foreach ($res as $item) $tags[] = $item['keyword'];
        foreach ($tags as $item) {
            $file_content = str_replace($item.'','<span class="highlight">'.$item.'</span>', $file_content);
        }
        echo (json_encode($tags));
        die;
    }
    public function pageAction()
    {
    }
    public function page2Action()
    {
    }
    public function page3Action()
    {
    }
    public function page4Action()
    {
    }
    public function page5Action()
    {
    }
    public function page6Action()
    {
    }
    public function page7Action()
    {
        // $video = LittleYoutube::video("https://www.youtube.com/watch?v=xQomv1gqmb4");
        // echo("Video ID:".$video->data['videoID']."\n");
        // print_r($video->getVideoImages());

        if (!isset($_GET['id']) && !isset($_POST['text'])) return;

        if(isset($_GET['id'])) {
            if(empty($_SESSION['buttons'])) $_SESSION['buttons'] = [];

            if (!in_array($_GET['id'], $_SESSION['buttons'])) $_SESSION['buttons'][] = $_GET['id'];
        }

        $embed_id = isset($_GET['id']) ? $_GET['id'] : null;
        $res = [];
        $file = isset($_POST['text']) ? $_POST['text'] : 'Java_Full_Stack_Developer_Resume_Java_Full_Stack_Developer_Profile_Java_Developer_Resumes_-_English_auto.srt';
        if ($embed_id == 'NFBmlewLt8w') {
            $file = 'Java_Full_Stack_Developer_Resume_Java_Full_Stack_Developer_Profile_Java_Developer_Resumes_-_English_auto.srt';
        } elseif ($embed_id == 'OmApr4hAm1A') {
            $file = 'AWS_Resume_Java_Developer_Resume_Java_Programmer_Profile_J2EE_Resume_Web_Developer_Resume_-_English_auto.srt';
        } elseif ($embed_id == 'oJPNMOisyCw') {
            $file = 'NET_Developer_Resume_DOT_Net_Developer_Profile_NET_Architect_Resume_USA_-_English_auto.srt';
        }
        $file_content = isset($_POST['text']) ? $_POST['text'] : file_get_contents(WWW.'/awork/'.$file);
        
        $cache = new Cache();
        if(!$res = $cache->get(md5($file))) {
            $ml = new Client('e2f52c54e422b987e8d72da5e26655ed5dc11930');
            $data = [$file_content];
            $model_id = 'ex_YCya9nrn';
            $res = $ml->extractors->extract($model_id, $data);
            $cache->set(md5($file), $res, 3600*24*5);
        }
        $res = $res->result[0];
        $tags = [];
        foreach ($res as $item) $tags[] = $item['keyword'];

        foreach ($tags as $item) {
            $file_content = str_replace($item.'','<span class="highlight">'.$item.'</span>', $file_content);
        }


        $my_id = $uid = $_SESSION['user']['id'];
        $route = $this->route;
        $user = $cur_user = \R::load('user', $_SESSION['user']['id']);

        View::setMeta('', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('title', 'user', 'my_id', 'uid', 'cur_user', 'route', 'embed_id','file','file_content','tags','res'));
    }
    public function page8Action()
    {
    }

    function get_c($url, $post = 0,$auth = false) {
        $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_URL, $url ); // отправляем на
        curl_setopt($ch, CURLOPT_HEADER, 0); // пустые заголовки
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // возвратить то что вернул сервер
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // следовать за редиректами
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);// таймаут4
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// просто отключаем проверку сертификата

        // referer: https://savesubs.com/process?url=https://youtu.be/5tcs2qXP3Pg
        curl_setopt($ch, CURLOPT_REFERER, 'https://savesubs.com/process?url=https://youtu.be/5tcs2qXP3Pg');
        curl_setopt($ch,CURLOPT_HTTPHEADER,[
            'Origin: https://savesubs.com',
            ':authority: savesubs.com',
            ':method: POST',
            ':path: /action/get'
        ]);

        if ($auth)
            curl_setopt($ch, CURLOPT_COOKIEJAR,  '/var/www/html/my_cookies.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE,  '/var/www/html/my_cookies.txt');
    
        curl_setopt($ch, CURLOPT_POST, $post !== 0);
        if ($post) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_POSTREDIR, 3);
        }
        $data = curl_exec($ch);
        curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);
        return $data;
    }

    public function getinfoAction() 
    {
        if ($_GET['id'] != 1 && $_GET['id'] != 2) die;
        if ($_GET['id'] == 1) {
            $id = '5tcs2qXP3Pg';
            $file = '5_Python_tricks_that_will_improve_your_life.srt';
        } else {
            $id = 'LjyDh61KV5Q';
            $file = 'Genomic_Education_Module_GEM_What_is_Genomic_Medicine.srt';
        }

        $file_content = file_get_contents(WWW.'/awork/'.$file);
        
        $cache = new Cache();
        if(!$res = $cache->get(md5($file))) {
            $ml = new Client('e2f52c54e422b987e8d72da5e26655ed5dc11930');
            // $data = ["Elon Musk has shared a photo of the spacesuit designed by SpaceX. This is the second image shared of the new design and the first to feature the spacesuit’s full-body look."];
            $data = [$file_content];
            $model_id = 'ex_YCya9nrn';
            $res = $ml->extractors->extract($model_id, $data);                
            $cache->set(md5($file), $res, 3600*24*5);
        }
        $res = $res->result[0];
        $tags = [];
        foreach ($res as $item) $tags[] = $item['keyword'];
        echo json_encode(compact('id','file','file_content','tags','res'));        
        die;
    }

    public function wirelessAction()
    {
        \R::addDatabase('DB1','mysql:host=localhost;dbname=sanchozzz_data;charset=utf8','sanchozzz_data','HqUuF6',true);
        \R::selectDatabase('DB1');

        // dd(\R::getCol('select  as count from output_05_1'));
        $r = \R::getAssoc('select device_id, gps from output_05_1 limit 10000'); 
        $out = ["type"=>"FeatureCollection","features"=>[]];
        foreach($r as $k => $item) {
            $coord = preg_replace("/[\(\)]/",'', $item);
            // dd($coord);
            $coord = explode(', ', $coord);
            $out["features"][] = [
                "type"=>"Feature", 
                "properties" => [ "Name" => $k, "Description" => "" ],
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [ $coord[1], $coord[0], 0.0 ]
                ]
            ];
        }


        echo json_encode($out);
        die;
    }
}
