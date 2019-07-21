<?php
/**
 * Created by PhpStorm.
 * User: Volodymyr
 * Date: 16.07.2019
 * Time: 18:01
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use app\models\Brand;
use Yii;
use yii\web\Controller;


class ProductController extends AppController
{
    public function actionView($id){

        //$id = Yii::$app->request->get('id');
        //      $product = Product::find()->with('category')->where(['id' => $id])->one();

        $brands = Brand::find()->all();

        $product = Product::findOne($id);
        if(empty($product))
            throw new \yii\web\HttpException(404, 'Выбранного товара не существует');

        $popular = Product::find()->where(['product_id' => '1'])->limit(6)->all();
        $this->setMeta('My E-Shopper | ' . $product->name);

        return $this->render('view', [
            'product' => $product,
            'brands' => $brands,
            'popular' => $popular,
            ]);
    }


}