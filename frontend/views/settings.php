<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */
/* @var $form ActiveForm */
?>
<div class="settings">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'theme') ?>
        <?= $form->field($model, 'paypal_id') ?>
        <?= $form->field($model, 'from_email') ?>
        <?= $form->field($model, 'contact_email') ?>
        <?= $form->field($model, 'facebook_url') ?>
        <?= $form->field($model, 'google_plus_url') ?>
        <?= $form->field($model, 'twitter_url') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- settings -->
