<?php 
namespace app\comment\ComWidget;

use yii\helpers\Html;
use yii;
 ?>
<?php foreach ($params as $value): ?> 
    <div class="user_comment">
        <div class="user">
            <span>
                <?= $value['com_autor']; ?>
            </span>
        </div>
        <div class="comment">
            <p>
                <?= $value['com_text']; ?>
            </p>
            <?php if(Yii::$app->user->isGuest){
               
            } else {
                echo Html::a('Удалить', ['comment/delete', 
                                    'id_comment' => $value->id, 
                                    'id_zam' => $result->id]);
            }
            ?>
        </div>
    </div>
<?php endforeach; ?>