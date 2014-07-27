<?php

use yii\helpers\Html;
/* @var $model app\models\Songs */

?>
<div class="songitem<?= $index%2==0?' lvalternate':''; ?>">
<div class="row">
	<div class="col-md-6">
		<h4>
			<?= Html::a($model->title, ['/songs/songview', 'id' => $model->id]); ?>
		</h4>
	</div>
	<div class="col-md-4">
		<?= Html::a($model->artist, ['/songs/songview', 'id' => $model->id]); ?>
	</div>
	<div class="col-md-2 text-right">
		<?= Html::a(Html::encode($model->year), ['/songs/songview', 'id' => $model->id]); ?>
	</div>
</div>
</div>