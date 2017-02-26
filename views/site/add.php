<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Address */
/* @var $form ActiveForm */
$this->title = 'Add new address';
?>
<div class="site-add">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'country_id')->dropDownList(
                ArrayHelper::map(\app\models\Country::find()->all(), 'id', 'name'),
                [
                    'prompt' => 'Select Country',
                    'onchange' => '
                    $.post("/site/cities-list?id=' . '"+$(this).val(), function(data) {
                        $("select#addressform-city_id").html(data);
                    });'
                ]
            )
        ?>
        <?= $form->field($model, 'city_id')->dropDownList(
                ['prompt' => 'Select City']
            )
        ?>
        <?= $form->field($model, 'street') ?>
        <?= $form->field($model, 'building') ?>

        <div class="form-group">
            <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-add -->
