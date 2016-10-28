<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
?>
<section id="contact">
        <div class="container padding-top-100">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Please choose your new password:</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?= $form->field($model, 'password')->textInput(['autofocus' => true,'placeholder'=>'Name','autocomplete'=>false]) ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg']) ?>
                            </div>
                        </div>
                    
            <?php ActiveForm::end(); ?>

               </div>
            </div>
        </div>
    </section>
