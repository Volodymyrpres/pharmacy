<?php
/**
 * Created by PhpStorm.
 * User: Volodymyr
 * Date: 15.07.2019
 * Time: 13:52
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use app\models\Brand;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;


class CategoryController extends AppController
{

    public function actionView($id)
    {
        //$id = Yii::$app->request->get('id');
        $brands = Brand::find()->all();


        $category = Category::findOne($id);
        if(empty($category))
            throw new \yii\web\HttpException(404, 'Выбранной категории не существует');

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 1,
            'forcePageParam' => FALSE,
            'pageSizeParam' => FALSE]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('Pharmacy | ' . $category->name, $category->meta_description);

        return $this->render('view', [
            'products' => $products,
            'brands' => $brands,
            'category' => $category,
            'pages' => $pages,
        ]);
    }

    public function actionSearch(){

        $brands = Brand::find()->all();

        $search = trim(Yii::$app->request->get('search'));
        $this->setMeta('Pharmacy | Поиск:' . $search);
        if(!$search)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $search]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => FALSE,
            'pageSizeParam' => FALSE]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'search', 'brands'));
    }
}