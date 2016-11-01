<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pages */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="pages-create">
<div class="box box-primary">
<div class = "box-header with-border">
<h3 class="box-title">Create</h3>
</div>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
