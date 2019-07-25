<?php
$currency =  \app\models\Setting::getSetting('currency');
?>

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <h3 class="box-title">Recent sales</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Назва</th>
                        <th>Кількість</th>
                        <th>Ціна</th>
                        <th>Сума</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order as $orders): ?>
                    <tr>

                        <td><?= $orders->id ?></td>
                        <td class="txt-oflo"><?= $orders->name ?></td>
                        <td><span><?= $orders->qty_item ?></span></td>
                        <td><span><?= $orders->price ?><?= $currency ?></span></td>
                        <td><span><?= $orders->sum_item ?><?= $currency ?></span></td>

                    </tr>
                    <?php endforeach; ?>
                    <?php
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
