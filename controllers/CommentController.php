<?php 
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;
use app\controllers\BehaviorsController;


class CommentController extends BehaviorsController
{
	public function actions()
	{
		return [
			'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
		];
	}
	/**
	* 
	* Create comment;
	*
	**/

	public function actionCreate($id)
	{
		$model = new Comment();
		if($model->load(Yii::$app->request->post())){
			$model->id_zam = $id;
			if($model->save()){
				yii::$app->cache->delete('comment');
				return Yii::$app->response->redirect(['/site/view', 'id' => $id]);
			}
		}
	}

	/**
	* 
	* Delete comment;
	*
	**/
	public function actionDelete($id_comment, $id_zam)
	{
		$model = Comment::find()->where('id=:id', [':id'=>$id_comment])->one();
		if($model->delete()){
			Yii::info('Удаление коментария', 'info');
			yii::$app->cache->delete('comment');
			return Yii::$app->response->redirect(['/site/view', 'id' => $id_zam]);
		}
		
	}

}

 ?>