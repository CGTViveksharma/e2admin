<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pages */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pages-update">
<div class="box box-primary">
<div class = "box-header with-border">
<h3 class="box-title">Update</h3>
</div>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
