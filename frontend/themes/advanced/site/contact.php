<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
?>


<section id="contact">
        <div class="container padding-top-100">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?= $form->field($model, 'name')->textInput(['autofocus' => true,'placeholder'=>'Name','autocomplete'=>false]) ?>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder'=>'Email','autocomplete'=>false]) ?>
                            </div>
                        </div>
                        
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                ]) ?>
                            </div>
                        </div>

                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?= $form->field($model, 'subject')->textInput(['autofocus' => true,'placeholder'=>'Subject','autocomplete'=>false]) ?>
                            </div>
                        </div>

                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?= $form->field($model, 'body')->textInput(['autofocus' => true,'placeholder'=>'Body','autocomplete'=>false]) ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-success btn-lg', 'name' => 'contact-button']) ?>
                            </div>
                        </div>
                    
            <?php ActiveForm::end(); ?>

               </div>
            </div>
        </div>
    </section>