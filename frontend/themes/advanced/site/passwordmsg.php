<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Change Password';
?>
<section id="contact">
    <div class="container padding-top-100">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Change Password</h2>
                <hr class="star-primary">                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php if(isset($msg)) 
                    {
                        echo '<div class="alert text-center '.$class.'" role="alert">'.$msg.'</div>';
                    }                
                ?>
                <a href="<?= Url::toRoute('/site/editprofile')?>" class="btn btn-warning btn-block"><b>Edit Profile</b></a>
                <a href="<?= Url::toRoute('/site/changepassword')?>" class="btn btn-primary btn-block"><b>Change Password</b></a>
            </div>
        </div>
    </div>
</section>