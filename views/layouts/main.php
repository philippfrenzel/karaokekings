<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <section id="header" class="appear"></section>
        <?php
        NavBar::begin([
            'brandLabel' => 'Lemmon Karaoke Kings',
            'brandUrl' => Yii::$app->homeUrl,
            'brandOptions' => [
                'data-0' => 'line-height:65px;',
                'data-300' => 'line-height:50px;'
            ],
            'options' => [
                'class' => 'navbar navbar-fixed-top',
                'role'  => 'navigation',
                'data-0' => 'line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);',
                'data-300' => 'line-height:60px; height:60px; background-color:rgba(0,0,0,1);'
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                //['label' => 'Contact', 'url' => ['/site/contact']],
                Yii::$app->user->isGuest ?
                    ['label' => 'Login', 'url' => ['/user/security/login']] :
                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/user/security/logout'],
                        'linkOptions' => ['data-method' => 'post']],
            ],
        ]);
        NavBar::end();
        ?>

        <section class="featured">
            <div class="container"> 
                <div class="row mar-bot20">
                    <div class="col-md-6 col-md-offset-3">
                        
                        <div class="align-center">
                            <i class="fa fa-star fa-4x"></i>
                            <h2 class="slogan">Lemmon Vienna</h2>    
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?= $content ?>

        <!-- about -->
        <section id="section-about" class="section appear clearfix">
        <div class="container">

                <div class="row mar-bot40">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="section-header">
                            <h2 class="section-heading animated" data-animation="bounceInUp">Our Team</h2>
                            <p>Webdevelopment is fun!</p>
                        </div>
                    </div>
                </div>

                    <div class="row align-center mar-bot40">
                        <div class="col-md-6">
                            <div class="team-member">
                                <div class="team-detail">
                                    <h4>Philipp Frenzel</h4>
                                    <span>Web developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="team-member">
                                <div class="team-detail">
                                    <h4>Christian Frenzel</h4>
                                    <span>Web developer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                        
        </div>
        </section>
        <!-- /about -->

        <section id="footer" class="section footer">
        <div class="container">
            <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
                <div class="col-sm-12 align-center">
                    <ul class="social-network social-circle">
                        <li><a href="http://www.facebook.com/pepefrenzel" class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://plus.google.com/u/0/102078578622410234043/posts/p/pub" class="icoGoogle" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    </ul>               
                </div>
            </div>

            <div class="row align-center copyright">
                    <div class="col-sm-12"><p>Copyright &copy; frenzel GmbH - by <a href="http://frenzel.net">Frenzel.NET</a></p></div>
            </div>
        </div>

    </section>

        <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
