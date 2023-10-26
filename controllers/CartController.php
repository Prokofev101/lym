<?php

namespace app\controllers;
use app\models\db\Order;
use app\models\db\OrderValue;
use Yii;
use yii\db\ActiveRecord;

class CartController extends AppController
{
    public function actionAdd()
    {
        $request = Yii::$app->request;
        $product_id = $request->get('card');
//        $order_id = $_COOKIE['lymshop_cart'] || false;
        $order_id = key_exists('lymshop_cart',$_COOKIE) ? $_COOKIE['lymshop_cart'] : false;
        if (!isset($_COOKIE['lymshop_cart'])) {
            $sql = "INSERT INTO `order` (`order_id`, `order_status_id`, `order_sum`, `order_create`, `order_edit`, `order_success`) VALUES (NULL, '1', NULL, " . time() . ", NULL, NULL)";
            Yii::$app->db->createCommand($sql)->execute();
            $order_id = Yii::$app->db->getLastInsertID();
            setcookie('lymshop_cart', $order_id);
        }
        //



        if ($order_id) {
            // $order_id = $_COOKIE['lymshop_cart'];
            $sql = 'INSERT INTO `order_value` (`order_id`, `product_id`) VALUES (' . $order_id . ', ' . $product_id . ')';
            Yii::$app->db->createCommand($sql)->execute();
            $order_id = Yii::$app->db->getLastInsertID();
        }

        return json_encode([
            'order_id' => $order_id,
        ]);
    }
    public function actionRemove()
    {
        $request = Yii::$app->request;
        $product_id = $request->get('card');
        $order_id = key_exists('lymshop_cart',$_COOKIE) ? $_COOKIE['lymshop_cart'] : false;
        if ($order_id && $product_id) {
            $sql = 'DELETE FROM order_value WHERE order_id='.$order_id.' AND product_id = '.$product_id.' LIMIT 1';
            Yii::$app->db->createCommand($sql)->execute();
//            $order_id = Yii::$app->db->getLastInsertID();
            return json_encode([
                'order_id' => $order_id,
            ]);
        }
        return json_encode([
            'errors' => 'order_id is not found',
        ]);
    }

    public function actionClear()
    {
        $request = Yii::$app->request;
        $order_id = key_exists('lymshop_cart',$_COOKIE) ? $_COOKIE['lymshop_cart'] : false;
        if ($order_id) {
            $sql = 'DELETE FROM order_value WHERE order_id='.$order_id;
//            die($sql);
            Yii::$app->db->createCommand($sql)->execute();
//            $order_id = Yii::$app->db->getLastInsertID();
            return json_encode([
                'order_id' => $order_id,
            ]);
        }
        return json_encode([
            'errors' => 'order_id is not found',
        ]);
    }

    public function actionAll()
    {
        $request = Yii::$app->request;
        $product_id = $request->get('card');
        $count = $request->get('count');
        $order_id = key_exists('lymshop_cart',$_COOKIE) ? $_COOKIE['lymshop_cart'] : false;
        if (!isset($_COOKIE['lymshop_cart'])) {
            $sql = "INSERT INTO `order` (`order_id`, `order_status_id`, `order_sum`, `order_create`, `order_edit`, `order_success`) VALUES (NULL, '1', NULL, " . time() . ", NULL, NULL)";
            Yii::$app->db->createCommand($sql)->execute();
            $order_id = Yii::$app->db->getLastInsertID();
            setcookie('lymshop_cart', $order_id);
        }
        if ($order_id && $count) {
            $result = [];
            // $order_id = $_COOKIE['lymshop_cart'];
            for ($i=0; $i<$count; $i++)
            {
                $sql = 'INSERT INTO `order_value` (`order_id`, `product_id`) VALUES (' . $order_id . ', ' . $product_id . ')';
                Yii::$app->db->createCommand($sql)->execute();
                $id = Yii::$app->db->getLastInsertID();
                $result[] = $id;
            }
            return json_encode([
                'order_id' => $result,
            ]);
        }
        return json_encode([
            'errors' => 'order_id or product_id or count is not found',
        ]);
    }
    public function actionIndex()
    {
        $result = [];
        $order_id = key_exists('lymshop_cart',$_COOKIE) ? $_COOKIE['lymshop_cart'] : false;
        if ($order_id){
            $query = new \yii\db\Query();
            $query->select(['COUNT(order_value.product_id) as count', 'order_value.product_id', 'products.title', 'products.img', 'SUM(products.price) as summary'])
                ->from('order_value')
                ->innerJoin('products', 'order_value.product_id = products.id')->where(['order_value.order_id' => $order_id])
                ->groupBy('product_id');

            $result = $query->all();

//            $sql = 'SELECT COUNT(order_value.product_id) as count, order_value.product_id, products.title, products.img, SUM(products.price) as summary FROM order_value
//                        inner JOIN products ON order_value.product_id = products.id GROUP BY product_id';
        }

//        return $this->render('index');
        return $this->render('index', ['result' => $result]);

    }
}