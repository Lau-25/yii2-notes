<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 ?>

 <div class="center clearfix">
    <div id="sidebar" class="left">
        <?= Html::a('Добавить заметку', ['site/create'], ['class'=>'sid-wrapp']) ?>
    </div>
                    
    <div id="content" class="right">
        <div class="note">

            <?php $form = ActiveForm::begin() ?>

            <?= $form->field($model, 'title') ?>

            <?= $form->field($model, 'autor') ?>

            <?= $form->field($model, 'content')->textarea(['rows'=>10]) ?>

            <div class="option clearfix">
                <?= Html::submitButton('Сохранить', ['class'=>'button left']) ?>
            </div>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>