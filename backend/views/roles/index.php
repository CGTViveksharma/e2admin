<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
  <div class="box box-primary">
  <div class = "box-header with-border">
    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
     <?=Yii::$app->helper->showSuccessMessage();?>
  </div>
  <div class="box-body">
<div class="user-index">

    <p>
        <?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?>
        <?=Yii::$app->helper->showAlert('roleDeleteFail','danger');?>
        <?=Yii::$app->helper->showAlert('roleDeleted','success');?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'description',
            ['class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'view'=> false,
                    'delete' => function () {
                        return Yii::$app->user->isGuest ? false : true;
                    },
                ],
                'buttons' => [
                    'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::toRoute('delete?role='.$model->name),['data-confirm' => 'Are you sure to delete user role?']);
                    },
                ],     
                'buttons' => [
                    'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::toRoute('update?role='.$model->name));
                    },
                ],                
            ],
        ],
    ]); ?>
</div>
</div>
</div>