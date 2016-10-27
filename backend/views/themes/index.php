<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ThemesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Themes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
  <div class = "box-header with-border">
    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    <?=Yii::$app->helper->showSuccessMessage();?>
  </div>
  <div class="box-body">
<div class="themes-index">

    <p>
        <?= Html::a('Create Themes', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Apply Theme', ['apply-theme'], ['class' => 'btn btn-info', 'id' => 'apply_theme']) ?>
        <?=Alert::widget([
            'options' => ['class' => 'alert-success success-message'],
            ]);
        ?>
    </p>

     <?php
        // Modal for Create theme Form 
        yii\bootstrap\Modal::begin([
            'header' => '<h4 class="modal-title">Apply Theme</h4>
            <div class="alert alert-danger alert-messages"></div>',
            'id' => 'create_themes_modal',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE],
        ]);

        $form = ActiveForm::begin(
                                    [
                                        'id' => 'form_themes',
                                        'action' => Url::toRoute('apply-theme'),
                                        'options'=>['class' => 'form-horizontal'],
                                        'fieldConfig' =>  [
                                            'template' => '{label} <div class="col-sm-10">{input}</div>',
                                            'labelOptions' => ['class' => 'col-sm-2 control-label' ],
                                            'options' => ['class' => 'form-group']
                                        ]
                                    ]
        ); 
        echo $form->field($configModel, 'theme')->dropDownList(ArrayHelper::map($themes, 'path_name','name'));
        
        echo  ' <div class="form-group row text-right"><div class="col-md-12">'.
                        Html::submitButton('Save', ['class' => 'btn btn-success']).' '.
                        Html::button('Cancel',  ['class' => 'btn btn-default' ,'data-dismiss' => 'modal']).
                    '</div></div>';

        ActiveForm::end();

        yii\bootstrap\Modal::end();
    ?>
    
<?php Pjax::begin(['id' => 'themes_pjax']); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'path_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => ['class' => 'table table-bordered table-hover']
    ]); ?>
<?php Pjax::end(); ?></div>
<?=$this->registerJsFile('@jspath/themes.js',['depends' => [yii\web\JqueryAsset::className()]]);