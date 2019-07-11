<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'meta_title',
            'title',
            'meta_description:ntext',
            'content:ntext',
            //'date',
            //'image',
            //'price:ntext',
            //'article:ntext',
            //'url:ntext',
            //'product_id',
            //'status',
            //'promotions_id',
            //'category_id',
            //'brand_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>