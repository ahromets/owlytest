<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Addresses';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <?php if (Yii::$app->session->getFlash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif; ?>
            <?php foreach ($addresses as $address): ?>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3><?= Html::encode($address->name) ?></h3></div>
                        <div class="panel-body">
                            <p><strong>Country:</strong> <?= Html::encode($address->country->name) ?></p>
                            <p><strong>City:</strong> <?= Html::encode($address->city->name) ?></p>
                            <p><strong>Address:</strong> <?= Html::encode($address->address) ?></p>
                        </div>
                        <div class="panel-footer"><a class="btn btn-default" href="<?= \yii\helpers\Url::to(['site/view', 'id' => $address->id]) ?>" target="_blank">View address</a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div><!--address row -->

        <div class="row">
            <div class="col-md-8">
                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
        </div><!--pagination row-->

    </div>
</div>
