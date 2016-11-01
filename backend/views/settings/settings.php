<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */
/* @var $form ActiveForm */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
?>
<div class="box box-primary">
<div class = "box-header with-border">
<h3 class="box-title"><?=Html::encode($this->title);?></h3>
<?=Yii::$app->helper->showErrorMessage(); ?>
<?=Yii::$app->helper->showSuccessMessage(); ?>
</div>
<div class="box-body">
<div class="settings  col-md-6 col-md-offset-3">

    <?php $form = ActiveForm::begin(
                                    [
                                        'id' => 'settings_form',
                                        'options'=>['class' => 'form-horizontal'],
                                        'fieldConfig' =>  [
                                            'template' => '{label} <div class="col-sm-9">{input}</div>',
                                            'labelOptions' => ['class' => 'col-sm-3 control-label' ],
                                            'options' => ['class' => 'form-group']
                                        ]
                                    ]
        ); ?>
        <?= $form->field($model, 'theme')->dropDownList(ArrayHelper::map($themes, 'path_name','name')) ?>
        <?= $form->field($model, 'paypal_id') ?>
        <?= $form->field($model, 'from_email') ?>
        <?= $form->field($model, 'contact_email') ?>
        <?= $form->field($model, 'facebook_url') ?>
        <?= $form->field($model, 'google_plus_url') ?>
        <?= $form->field($model, 'twitter_url') ?>
    
        <div class="box-footer pull-right">
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
<!-- settings -->
