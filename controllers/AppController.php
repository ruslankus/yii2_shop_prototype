<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 17/07/16
 * Time: 17:43
 */

namespace app\controllers;


use yii\web\Controller;

abstract class AppController extends Controller
{
    protected function setMeta($title=null, $meta=null, $description=null)
    {
        $this->view->title = $title;

        $this->view->registerMetaTag(['name'=> 'keywords', 'content' => $meta]);

        $this->view->registerMetaTag(['name'=> 'description', 'content' => $description]);
    }
}