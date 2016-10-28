<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;

$this->title = 'Edit Profile';
?>
<section id="contact-info">
    <div class="container">
      	<div class="center">        
           	<h2>Edit Profile</h2>
        </div> 
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="row contact-wrap">
            <div class="col-sm-6">
				<div class="clients-comments text-center">
                    <img src="<?= Url::to('@web/'.$model->image)?>" class="img-circle" alt="">
                    <?= $form->field($model, 'file')->fileInput() ?>
                </div>
            </div>
            <div class="col-sm-6">            	
                        <?= $form->field($model, 'firstname') ?>

                        <?= $form->field($model, 'lastname') ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'readonly'=>true]) ?>

                        <?= $form->field($model, 'email')->textInput(['autofocus' => true,'readonly'=>true]);?>
                        
                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-warning btn-block', 'name' => 'signup-button']) ?>
                        </div>
                <a href="<?= Url::toRoute('/site/profile')?>" class="btn btn-primary btn-block"><b>Cancel</b></a>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>