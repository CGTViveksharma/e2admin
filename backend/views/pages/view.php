<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Pages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
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
<div class="pages-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'content:ntext',
            'meta_title',
            'meta_keywords',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
</div>
