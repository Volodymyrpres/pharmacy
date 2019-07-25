<?php
use yii\helpers\Html;
$currency =  \app\models\Setting::getSetting('currency');

?>

<?php if(!empty($session['cart'])): ?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <td>Фото</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена</td>
            <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($session['cart'] as $id => $item): ?>
            <tr>
                <td><?= Html::img(\Yii::$app->imagemanager->getImagePath($item['image'], 50,50)) ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td><?= $item['price'] ?><?= $currency ?></td>
                <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">Итого: </td>
            <td><?= $session['cart.qty'] ?></td>
        </tr>
        <tr>
            <td colspan="4">На сумму: </td>
            <td><?= $session['cart.sum'] ?><?= $currency ?></td>
        </tr>
        </tbody>
    </table>
</div>
<?php else: ?>
    <h2>Корзина пуста</h2>
<?php endif; ?>
