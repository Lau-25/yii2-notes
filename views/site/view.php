<?php 
use yii\helpers\Html;
use app\models\Comment;
use yii\widgets\ActiveForm;
use app\components\ComWidget\ComWidget;

$model = new Comment;

 ?>
<div class="center clearfix">
                    <div id="sidebar" class="left">
                       <?= Html::a('Добавить заметку', ['site/create'], ['class'=>'sid-wrapp']) ?>
                    </div>

                    <div id="content" class="right">
                        <div class="note">
                            <div class="note-head">
                                <span class="note-title"><?= Html::encode($result->title) ?></span>
                            </div>

                            <div class="note-content">
                                <p>
                                <?= Html::encode($result->content) ?>
                                </p>
                            </div>

                            <div class="note-footer clearfix">
                                <span class="note-autor left">
                                    <?= $result->getAttributeLabel('autor') ?>
                                    <?= Html::encode($result->autor) ?>
                                </span>
                                <span class="note-time right">
                                    <?= $result->getAttributeLabel('time') ?>
                                    <?= Html::encode($result->time) ?>
                                </span>
                            </div>
                            
                            <div class="option clearfix">
                                <?= Html::a('Редактировать', ['site/edit', 'id'=>$result->id], ['class'=>'button left'] )?>
                                <?= Html::a('Удалить', ['site/delete', 'id'=>$result->id], ['class'=>'button right'] )?>
                            </div>

                            <div class="comments">
                                <h3>Список Коментариев</h3>
                                <?php echo ComWidget::widget(['params'=>$comment]); ?>
                                <h3>Добавить заметку</h3>
<?php $form = ActiveForm::begin([
    'action' => ['/comment/create', 'id' => $result->id],
]) ?>
<?= $form->field($model, 'com_autor')->label('Ваше имя')  ?>
<?= $form->field($model, 'com_text')->textarea(['rows'=>2, 'cols'=>5])->label('Ваш коментарий') ?>
<?= $form->field($model, 'verifyCode')->widget(yii\captcha\Captcha::className(),
        ['captchaAction' => '/comment/captcha',
         'template' => '<div class="row">
                            <div class="col-xs-3">{image}</div>
                            <div class="col-xs-4">{input}</div>
                        </div>'
        ]
        )->hint('Нажмите на картинку, чтобы обновить.') ?>
<?= Html::submitButton('Добавить') ?>

<?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>
                </div>