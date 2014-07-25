<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
$this->title = 'Karaoke Kings - Lemonbar Catalogue';
?>

<section id="section-services" class="section pad-bot30 bg-white">
    <div class="container">
        <div class="row mar-bot40">
            <div class="col-lg-6">
                <h2>Songs</h2>

                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'itemView' => function ($model, $key, $index, $widget) {
                        return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
                    },
                ]) ?>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
        </div>
    </div>
</section>
