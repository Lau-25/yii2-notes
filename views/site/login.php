<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;

 ?>
 <div class="center clearfix">
    <div id="sidebar" class="left">
        <?php $form = ActiveForm::begin([
            'action'=>'/auth/login',
            'options'=>['class'=>'search sid-wrapp']
        ]) ?>
            <?= $form->field($model, 'username')->label('username :') ?>
            <?= $form->field($model, 'password')->label('password :') ?>
            <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>
            <?= Html::submitButton('Вход') ?>
        <? ActiveForm::end() ?>
    </div>
</div>