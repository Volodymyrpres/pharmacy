<?php

namespace app\controllers;
use yii\web\Controller;

class AppController extends Controller{

    protected function setMeta($title = null, $meta_description = null) {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'title', 'content' => "title"]);
    }

}