<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?php // $form->field($model, 'brand_id')->textInput() ?>

    <?= $form->field($model, 'meta_title') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'meta_description') ?>

    <?= $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'brand_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
