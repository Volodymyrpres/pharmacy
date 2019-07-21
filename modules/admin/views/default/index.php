<?php




?>

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                <select class="form-control pull-right row b-none">
                    <option>March 2017</option>
                    <option>April 2017</option>
                    <option>May 2017</option>
                    <option>June 2017</option>
                    <option>July 2017</option>
                </select>
            </div>
            <h3 class="box-title">Recent sales</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Назва</th>
                        <th>Кількість</th>
                        <th>Ціна</th>
                        <th>Статус</th>
                        <th>Дата</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order as $orders): ?>
                    <tr>

                        <td><?= $orders->id ?></td>
                        <td class="txt-oflo"><?= $orders->name ?></td>
                        <td><span class="text-success"><?= $orders->qty_item ?></span></td>
                        <td><span class="text-success">$<?= $orders->price ?></span></td>

                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
