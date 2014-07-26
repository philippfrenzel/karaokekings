<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="section-services" class="section pad-bot30 bg-white">
    <div class="container">
	    <h1><?= Html::encode($this->title) ?></h1>

	    <p>
	        This is the About page. You may modify the following file to customize its content:
	    </p>

	    <code><?= __FILE__ ?></code>
	</div>
</section>
