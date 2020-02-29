<?php 


 ?>
 <div class="center clearfix">
    <div id="sidebar" class="left">
        <!--<div class="search sid-wrapp">
            Поиск :<br/>
            <input type="text">
        </div>-->
        <?php $form = ActiveForm::begin([
            'action'=>'/site/search',
            'options'=>['class'=>'search sid-wrapp']
        ]) ?>
            <?= $form->field($model, 'search')->label('Поиск :') ?>
            <?= Html::submitButton('Искать') ?>
        <? ActiveForm::end() ?>

        <?= Html::a('Добавить заметку', ['site/create'], ['class'=>'sid-wrapp']) ?>
    </div>
    <div id="content" class="right">
        <?= ListView::widget([
            'dataProvider'=>$dataProvider, 
            'itemView'=>'_view',
            'summary'=>false,
            ]); 
        ?>
       
    </div>
</div>