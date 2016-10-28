<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Profile';
?>
<section id="contact-info">
    <div class="container">
      	<div class="center">        
           	<h2>Profile</h2>
        </div> 
        <div class="row contact-wrap">
            <div class="col-sm-6">
				<div class="clients-comments text-center">
                    <img src="<?= Url::to('@web/'.$model->image)?>" class="img-circle" alt="">
                </div>
            </div>
            <div class="col-sm-6">
            	<ul class="list-group list-group-unbordered">
            	<li class="list-group-item">
                  <b>First Name</b> <a class="pull-right"><?= strtoupper( $model->firstname) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Last Name</b> <a class="pull-right"><?= strtoupper( $model->lastname) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?= strtoupper( $model->username) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?= $model->email ?></a>
                </li>
              </ul>
                <a href="<?= Url::toRoute('/site/editprofile')?>" class="btn btn-warning btn-block"><b>Edit Profile</b></a>
                <a href="<?= Url::toRoute('/site/changepassword')?>" class="btn btn-primary btn-block"><b>Change Password</b></a>
            </div>
        </div>
    </div>
</section>