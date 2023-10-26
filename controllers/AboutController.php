<?php

namespace app\controllers;

class AboutController extends HomeController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}