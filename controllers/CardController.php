<?php

namespace app\controllers;
use app\models\db\Categories;
use app\models\db\Products;
use Yii;
class CardController extends AppController
{
    public function actionIndex($id)
    {
        $id = Yii::$app->request->get('id');
        $product = Products::findOne($id);
        return $this->render('index', compact('product'));
    }
}