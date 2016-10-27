<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="box-body">
<div class="user-form col-md-6 col-md-offset-3">
        <?=Yii::$app->helper->renderErrors($model->errors); ?>
        <?php $form = ActiveForm::begin(
                                    [
                                        'id' => 'user_form',
                                        'options'=>['class' => 'form-horizontal'],
                                        'fieldConfig' =>  [
                                            'template' => '{label} <div class="col-sm-10">{input}</div>',
                                            'labelOptions' => ['class' => 'col-sm-2 control-label' ],
                                            'options' => ['class' => 'form-group']
                                        ]
                                    ]
        ); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'autocomplete' => 'off']) ?>

    <?= $form->field($model, 'password')->passwordInput(['autocomplete' => 'off']) ?>

     <?=$form->field($model,'role')->dropDownList(ArrayHelper::map($auth_roles,'name','name'),['prompt' => 'Select Role']);?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="box-footer pull-right">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a('Cancel', Url::toRoute('index'),  ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
