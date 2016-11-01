<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">
<div class="pages-form col-md-6 col-md-offset-3">

    <?=Yii::$app->helper->renderErrors($model->errors); ?>
    <?php $form = ActiveForm::begin(
                                [
                                    'id' => 'pages_form',
                                    'options'=>['class' => 'form-horizontal'],
                                    'fieldConfig' =>  [
                                        'template' => '{label} <div class="col-sm-9">{input}</div>',
                                        'labelOptions' => ['class' => 'col-sm-3 control-label' ],
                                        'options' => ['class' => 'form-group']
                                    ]
                                ]
    ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'content')->textarea(['rows' => 6])->widget(\yii\redactor\widgets\Redactor::className(),
            [
                'clientOptions' => [
                    'imageUpload' => \yii\helpers\Url::to(['/redactor/upload/image']),
                ],
            ]
    ); ?>

    <?= $form->field($model, 'seoname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]); ?>

    <div class="box-footer pull-right">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
             <?= Html::a('Cancel', Url::toRoute('index'),  ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
