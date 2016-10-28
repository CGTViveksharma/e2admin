<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Change Password';
?>
<section id="contact-info">
    <div class="container">
      	<div class="center">        
           	<h2>Change Password</h2>
            <?php if(isset($msg)) 
                {
                    echo '<div class="alert '.$class.'" role="alert">'.$msg.'</div>';
                }                
            ?>
        </div> 
        <div class="row contact-wrap">
            <div class="col-sm-6 col-sm-offset-3 col-xs-12">
                <a href="<?= Url::toRoute('/site/editprofile')?>" class="btn btn-warning btn-block"><b>Edit Profile</b></a>
                <a href="<?= Url::toRoute('/site/changepassword')?>" class="btn btn-primary btn-block"><b>Change Password</b></a>
            </div>
        </div>
    </div>
</section>