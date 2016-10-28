<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Emails */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
  <div class = "box-header with-border">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger delete-request',
        ]) ?>
        <?= Html::a('Go Back',Url::toRoute('index'),['class' => 'btn btn-default pull-right']) ?>
  </div>
  <div class="box-body">
<div class="emails-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'subject',
            [
                'attribute'=>'body', 
                'format'=>'html',
                'widgetOptions'=>[
                    'class'=>\yii\redactor\widgets\Redactor::className(),
                ]
            ],
        ],
    ]) ?>

</div>
</div>
