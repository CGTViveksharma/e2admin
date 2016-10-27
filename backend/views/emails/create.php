<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Emails */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="emails-create">
<div class="box box-primary">
<div class = "box-header with-border">
<h3 class="box-title">Create</h3>
</div>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
