<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;

$this->title = 'Signup';
?>
<section id="contact">
    <div class="container padding-top-100">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>SIGN UP</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <?= $form->field($model, 'firstname')->textInput(['autofocus' => true,'placeholder'=>'First Name','autocomplete'=>false]) ?>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <?= $form->field($model, 'lastname')->textInput(['autofocus' => true,'placeholder'=>'Last Name','autocomplete'=>false]) ?>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'UserName','autocomplete'=>false]) ?>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder'=>'Email','autocomplete'=>false]) ?>

                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <?= $form->field($model, 'password')->passwordInput(['autofocus' => true,'placeholder'=>'Password','autocomplete'=>false]) ?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-success btn-lg btn-block', 'name' => 'signup-button']) ?>
                        </div>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>