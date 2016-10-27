<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Emails */

$this->title = 'Emails' ;
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emails-update">
<div class="box box-primary">
<div class = "box-header with-border">
<h3 class="box-title">Update</h3>
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
