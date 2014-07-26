<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Songs
    <?= var_dump($lyrics); ?>
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Songs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="section-services" class="section pad-bot30 bg-white">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1><?= Html::encode($this->title) ?> <small><?= Html::encode($model->artist) ?></small></h1>
                <a href="<?= Url::toRoute(['/site/index']); ?>"><i class="fa fa-arrow-left fa-4x"></i>Back</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                <img src="<?= is_Object($lyrics)?Html::encode($lyrics->LyricCovertArtUrl):'' ?>">
            </div>
            <div class="col-md-10">
<pre>
<?= is_Object($lyrics)?Html::encode($lyrics->Lyric):Html::encode($model->lyrics) ?>
</pre>                
            </div>
        </div>

        
<?php if(is_object($relatedTracks)):?>
    <div class="row">
        <div class="col-md-10 col-md-offset-2"> 
        <h2>Weitere Titel von <?= Html::encode($model->artist) ?></h2>   
        <?php foreach($relatedTracks->toptracks->track AS $Song): ?>
            <h4> >> <?= Html::encode($Song->name); ?></h4>
        <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>


    </div>
</section>
