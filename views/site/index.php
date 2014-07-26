<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
$this->title = 'Karaoke Kings - Lemmon Catalogue';
?>

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
                <h2>Bestellungen</h2>
                <p>* Spritzer Weiss</p>
            </div>
        </div>
    </div>
</section>
