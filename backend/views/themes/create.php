<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Themes */

$this->title = 'Themes';
$this->params['breadcrumbs'][] = ['label' => 'Themes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="themes-create">
<div class="box box-primary">
<div class = "box-header with-border">
<h3 class="box-title">Create</h3>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
