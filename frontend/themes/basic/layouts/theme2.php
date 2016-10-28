<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\Theme2Asset;
use common\widgets\Alert;

Theme2Asset::register($this);
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
<body id="page-top" class="index">
<?php $this->beginBody() ?>
<!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll <?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='index'?'active':''?>">
                            <a href="<?= Url::toRoute('/site')?>">Home</a>
                        </li>
                        <li class="page-scroll <?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='about'?'active':''?>">
                            <a href="<?= Url::toRoute('/site/about')?>">About Us</a>
                        </li>
                        <li class="page-scroll <?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='contact'?'active':''?>">
                            <a href="<?= Url::toRoute('/site/contact')?>">Contact</a>
                        </li>
                        <?php
                            if(Yii::$app->user->isGuest)
                            {
                                ?>                                
                                <li class="page-scroll <?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='login'?'active':''?>">
                                    <a href="<?= Url::toRoute('/site/login')?>">Login</a>
                                </li>
                                <li class="page-scroll <?= Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='signup'?'active':''?>">
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?= $content?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
