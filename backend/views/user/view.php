<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Users';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'View';
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
<div class="user-view">
<?php
    //check for image existance

    if(!empty($model->image) && file_exists('uploads/user/'.$model->image)){
        $column_image  =  [
                'attribute'=>'image',
                'value' => '@user_profile_photo_path/'.$model->image,
                'format' =>['image',['height'=>'100']],
            ];
    }
    else{
        $column_image = [
            'attribute'=>'image',
            'value' =>'No image',
        ];
    }
?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstname',
            'lastname',
            'username',
            'email:email',
            'role',
           $column_image,
            'created_at:date',
        ],
    ]) ?>

</div>
</div>
</div>