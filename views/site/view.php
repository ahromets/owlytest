<?php
use tugmaks\GoogleMaps\Map;
use yii\helpers\Html;

$this->title = Html::encode($address->name);
?>

<div class="row" onload="init()">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3><?= Html::encode($address->name) ?></h3></div>
            <div class="panel-body">
                <p><strong>Country:</strong> <?= Html::encode($address->country->name) ?></p>
                <p><strong>City:</strong> <?= Html::encode($address->city->name) ?></p>
                <p><strong>Address:</strong> <?= Html::encode($address->address) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <?php
        echo Map::widget([
            'zoom' => 16,
            'center' => Html::encode($fullAddress),
            'width' => 700,
            'height' => 400,
            'mapType' => Map::MAP_TYPE_TERRAIN,
            'markers' => [
                [
                    'position' => Html::encode($fullAddress),
                    'title' => Html::encode($address->name),
                ],
            ]
        ]);
        ?>
    </div>
</div>