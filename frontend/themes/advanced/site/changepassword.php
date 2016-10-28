<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Change Password';
?>
<section id="contact">
    <div class="container padding-top-100">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Change Password</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
            	<?php $form = ActiveForm::begin
                    ([
                        'id'=>'changepassword-form',
                        'options'=>['class'=>'form-horizontal'],
                        'fieldConfig'=>[
                                    'template'=>"{label}\n<div class=\"col-lg-9\">
                                                {input}</div>\n<div class=\"col-lg-9 col-lg-offset-3\">
                                                {error}</div>",
                                    'labelOptions'=>['class'=>'col-lg-3 control-label'],
                                    ],
                    ]); 
                ?>
                    <?= $form->field($model,'oldpass',['inputOptions'=>['placeholder'=>'Old Password']])->passwordInput() ?>
                    
                    <?= $form->field($model,'newpass',['inputOptions'=>['placeholder'=>'New Password']])->passwordInput() ?>
                    
                    <?= $form->field($model,'repeatnewpass',['inputOptions'=>['placeholder'=>'Repeat New Password']])->passwordInput() ?>
                    
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?= Html::submitButton('Confirm password',[
                                'class'=>'btn btn-success btn-lg btn-block'
                            ]) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
                <a href="<?= Url::toRoute('/site/profile')?>" class="btn btn-warning btn-lg btn-block"><b>Cancel</b></a>
            </div>
        </div>
    </div>
</section>