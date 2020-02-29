<?php 
	use yii\helpers\Html;
 ?>

<div class="note">
    <div class="note-head">
            <span class="note-title">
            	<?= Html::a(Html::encode($model->title), ['site/view', 'id'=>Html::encode($model->id)]) ?>
            </span>
        </a>
    </div>

    <div class="note-footer">
        <span class="note-autor left">
            <?= $model->getAttributeLabel('autor') ?>
            <?= Html::a(Html::encode($model->autor), ['site/search', 'autor'=>Html::encode($model->autor)]) ?>
        </span>
        <span class="note-time right">
            <?= $model->getAttributeLabel('time') ?>
            <?= Html::encode($model->time) ?>
        </span>
    </div>
</div>