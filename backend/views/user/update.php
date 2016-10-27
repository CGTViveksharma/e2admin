<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Users';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">
<div class="box box-primary">
<div class = "box-header with-border">
<h3 class="box-title">Update</h3>
</div>
    <?= $this->render('_form', [
        'model' => $model,
         'auth_roles' =>$auth_roles
    ]) ?>

</div>
</div>