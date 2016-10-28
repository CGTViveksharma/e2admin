<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
?>


<section id="contact">
    <div class="container padding-top-100">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Request password reset</h2>
                <hr class="star-primary">
                <p class="lead">Please fill out your email. A link to reset password will be sent there.</p>
            </div>
        </div>
        <div class="row">
            <div class="status alert alert-success" style="display: none"></div>
                <div class="col-lg-8 col-lg-offset-2">
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder'=>'Email','autocomplete'=>false]) ?>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <?= Html::submitButton('Send', ['class' => 'btn btn-success btn-lg']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
</section>
