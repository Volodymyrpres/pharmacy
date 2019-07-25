<?php

namespace app\modules\admin\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItem;
use Yii;
use yii\web\Controller;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $order = OrderItem::find()->all();


        return $this->render('index', compact('order'));
    }
}
