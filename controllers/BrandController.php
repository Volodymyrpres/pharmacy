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
        $brands = Brand::getBrands();
        $id = Yii::$app->request->get('id');

        $query = Product::find()->where(['brand_id' => $id]);

        $brand = Brand::findOne($id);
        if(empty($brand))
            throw new \yii\web\HttpException(404, 'Выбранного бренда не существует');

        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 1,
            'forcePageParam' => FALSE,
            'pageSizeParam' => FALSE]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();



        $this->setMeta('Pharmacy | ' . $brand->name, $brand->meta_description);

        return $this->render('view', [
            'products' => $products,
            'brand' => $brand,
            'brands' => $brands,
            'pages' => $pages,
        ]);
    }


}