<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\FrontAsset;
use common\widgets\Alert;

FrontAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
  <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href=""><?= Html::img('@web/images/logo.png');?></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="<?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='index'?'active':''?>">
                            <a href="<?= Url::toRoute('/site')?>">Home</a>
                        </li>
                        <li class="<?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='about'?'active':''?>">
                            <a href="<?= Url::toRoute('/site/about')?>">About Us</a>
                        </li>
                        <li class="<?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='contact'?'active':''?>">
                            <a href="<?= Url::toRoute('/site/contact')?>">Contact</a>
                        </li>
                        <?php
                            if(Yii::$app->user->isGuest)
                            {
                                ?>                                
                                <li class="<?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='login'?'active':''?>">
                                    <a href="<?= Url::toRoute('/site/login')?>">Login</a>
                                </li>
                                <li class="<?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='signup'?'active':''?>">
                                    <a href="<?= Url::toRoute('/site/signup')?>">Sign Up</a>
                                </li>                    
                                <?php
                            }
                            else {
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="background: #404040"><i class="fa fa-user"></i> <?= strtoupper(Yii::$app->user->identity->username) ?> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= Url::toRoute('/site/changepassword')?>">Change Password</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?= Url::toRoute('/site/profile')?>">Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a><?=  Html::beginForm(['/site/logout'], 'post')
                                            . Html::submitButton(
                                                'Logout',
                                                ['class' => 'btn btn-link']
                                            )
                                            . Html::endForm()?></a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

<?= $content ?>

<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
