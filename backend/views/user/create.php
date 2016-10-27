<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Users';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="user-create">
<div class="box box-primary">
<div class = "box-header with-border">
<h3 class="box-title">Create</h3>
</div>

    <?= $this->render('_form', [
        'model' => $model,
         'auth_roles' => $auth_roles
    ]) ?>

</div>
</div>
