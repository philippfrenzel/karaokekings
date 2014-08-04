<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
$this->title = 'Cassandra Pate - Personal Webpage and CV';
?>

<section class="featured">
    <div class="container"> 
        <div class="row mar-bot20">
            <div class="col-md-6 col-md-offset-3">
                
                <div class="align-center">
                    <i class="fa fa-graduation-cap fa-4x"></i>
                    <h2 class="slogan">Cassandra Pate</h2>    
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-services" class="section pad-bot30 bg-white">
    <div class="container">
        <div class="row mar-bot40">
            <div class="col-lg-8">
                <h2>Lieder</h2>
                <?php echo $this->render('/songs/_search', ['model' => $searchModel]); ?>
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'itemView' => '/songs/iviews/_item',
                    'pager' => ['class' => \kop\y2sp\ScrollPager::className()]
                ]) ?>
            </div>
            <div class="col-lg-4">
                <h2>Karte</h2>
                <p>
                    
                </p>
            </div>
        </div>
    </div>
</section>

<!-- spacer section:testimonial -->
<section id="testimonials" class="section" data-stellar-background-ratio="0.5">
<div class="container">
    <div class="row">               
            <div class="col-lg-12">
                    <div class="align-center">
                                <div class="testimonial pad-top40 pad-bot40 clearfix">
                                    <h5>
                                        Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum. In vitae nulla lacus. Sed sagittis tortor vel arcu sollicitudin nec tincidunt metus suscipit.Nunc velit risus, dapibus non interdum.
                                    </h5>
                                    <br/>
                                    <span class="author">&mdash; MIKE DOE <a href="#">www.siteurl.com</a></span>
                                </div>

                        </div>
                    </div>
            </div>
        
    </div>  
</div>  
</section>
