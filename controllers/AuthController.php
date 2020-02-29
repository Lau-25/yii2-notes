<?php 
namespace app\controllers;

use Yii;
use app\models\LoginForm;
use yii\widgets\ActiveForm;
use yii\web\Controller;



	class AuthController extends Controller
	{
		public function actionLogin()
		{
			if(!yii::$app->user->isGuest){
				return $this->goHome();
			}

			$model = new LoginForm();
			if($model->load(Yii::$app->request->post()) && $model->login()){
				Yii::info('Вход на сайт админа', 'info');
				return $this->goBack();
			}

			return $this->render('/site/login', [
				'model' => $model
			]);
		}

		public function actionLogout()
		{
			yii::$app->user->logout();
			return $this->goHome();
		}
	}
 ?>