<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
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
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Username','autocomplete'=>false]) ?>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true,'placeholder'=>'Password','autocomplete'=>false]) ?>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 ">
                                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                            </div>
                        </div>

                        

                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                        </div>

                        
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-lg btn-block', 'name' => 'login-button']) ?>
                            </div>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
        </div>
    </div>
</section>