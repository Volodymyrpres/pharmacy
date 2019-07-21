<?php
/**
 * Created by PhpStorm.
 * User: Volodymyr
 * Date: 16.07.2019
 * Time: 15:15
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use app\models\Brand;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;


class BrandController extends AppController
{
    public function actionView($id)
    {
        //$id = Yii::$app->request->get('id');
        $brands = Brand::getBrands();


        $query = Product::find()->where(['brand_id' => $id]);

        $brandone = Brand::findOne($id);
        if(empty($brandone))
            throw new \yii\web\HttpException(404, 'Выбранного бренда не существует');

        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 1,
            'forcePageParam' => FALSE,
            'pageSizeParam' => FALSE]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();



        $this->setMeta('Pharmacy | ' . $brandone->name, $brandone->meta_description);

        return $this->render('view', [
            'products' => $products,
            'brandone' => $brandone,
            'brands' => $brands,
            'pages' => $pages,
        ]);
    }


}