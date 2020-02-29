<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class BehaviorsController extends Controller {

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'controllers' => ['site'],
                        'actions' => ['index', 'search', 'view'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['site'],
                        'actions' => ['index', 'create', 'edit', 'delete', 'view', 'search'],
                        'roles' => ['@'],
                    ],
                    [   
                        'allow' => true,
                        'controllers' => ['comment'],
                        'actions' => ['create', 'captcha'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'controllers' => ['comment'],
                        'actions' => ['delete', 'captcha'],
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }
}

 ?>