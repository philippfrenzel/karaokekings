<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Songs */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Songs',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Songs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="songs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
