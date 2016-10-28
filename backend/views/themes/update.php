<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Themes */

$this->title = 'Update Themes: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Themes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="themes-update">
<div class="box box-primary">
<div class = "box-header with-border">
<h3 class="box-title">Update</h3>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
