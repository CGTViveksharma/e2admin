<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Themes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">
<div class="themes-form col-md-6 col-md-offset-3">
    <?=Yii::$app->helper->showErrorMessage();?>
    <?php $form = ActiveForm::begin(
                                [
                                    'id' => 'form_themes',
                                    'options'=>['class' => 'form-horizontal'],
                                    'fieldConfig' =>  [
                                        'template' => '{label} <div class="col-sm-10">{input}</div>',
                                        'labelOptions' => ['class' => 'col-sm-2 control-label' ],
                                        'options' => ['class' => 'form-group']
                                    ]
                                ]
    ); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'path_name')->textInput(['maxlength' => true]) ?>

    <div class="box-footer pull-right">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a('Cancel', Url::toRoute('index'),  ['class' => 'btn btn-default']) ?>
        </div>
     </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
