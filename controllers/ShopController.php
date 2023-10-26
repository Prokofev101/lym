<?php

namespace app\controllers;

class ShopController extends HomeController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}