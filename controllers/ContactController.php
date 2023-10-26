<?php

namespace app\controllers;

class ContactController extends HomeController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}