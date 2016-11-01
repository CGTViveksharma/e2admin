<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
  <div class="box box-primary">
  <div class = "box-header with-border">
    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    <?=Yii::$app->helper->showSuccessMessage();?>
  </div>
  <div class="box-body">
<div class="emails-index">

    <p>
        <?php //echo Html::a('Create Emails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(['clientOptions' => ['method' => 'post']]); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'subject',
            'body:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'delete' => false
                ]
            ],
        ],
        'tableOptions' => ['class' => 'table table-bordered table-hover']
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
</div>
