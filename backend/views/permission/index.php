<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permissions';
$this->params['breadcrumbs'][] = $this->title;
?>
  <div class="box box-primary">
  <div class = "box-header with-border">
    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>
  <div class="box-body">
<div class="user-index">

    <p>
        <?= Html::a('Create Permission', ['create'], ['class' => 'btn btn-success']) ?>
        <?=Yii::$app->helper->showAlert('permissionDeleted','success')?>
        <?=Yii::$app->helper->showAlert('updatedPermission','success')?>
        <?=Yii::$app->helper->showAlert('permissionDeleteFail','danger')?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'description',
            ['class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'view' => false
            ],
            'buttons' => [
                'update' => function($url, $model){
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::toRoute('update?permission='.$model->name));
                },
                'delete' => function($url, $model){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::toRoute('delete?permission='.$model->name),['data-confirm' => 'Are you sure to delete user permission?']);
                }
            ]
            ],
        ],
    ]); ?>
</div>
</div>
</div>