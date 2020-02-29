<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\controllers\BehaviorsController;
use yii\web\Response;
use yii\data\ActiveDataProvider;
use app\models\Zam;
use app\models\SearchForm;
use yii\helpers\Html;

class SiteController extends BehaviorsController
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Zam::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 4
            ],
        ]);

        return $this->render('index',[
            'dataProvider'=>$provider,
        ]);
    }

    /**
    *Display view.
    *
    */
    public function actionView($id)
    {
        $query = Zam::find()->where('id=:id', [':id'=>$id])->one();
        
        $comment = yii::$app->cache->get('comment');

        if($comment === false){
            $comment = $query->comment;
            yii::$app->cache->set('comment', $comment);
        }
        

        return $this->render('view',[
            'result' => $query,
            'comment' => $comment
        ]);
    }

    /**
    *Display Edit
    *
    */
    public function actionEdit($id)
    {
        $model = Zam::find()->where('id=:id', [':id'=>$id])->one();

        if($model->load(Yii::$app->request->post())){
            if($model->save()){
                Yii::info('Редактирование заметки', 'info');
                Yii::$app->response->redirect('/site/index');
            }
        }

        return $this->render('create', [
            'model'=>$model,
        ]);
    }

    /**
    *Display create 
    *
    */
    public function actionCreate()
    {
        $model = new Zam();

        if($model->load(Yii::$app->request->post())){
            $model->time = date("H:i:s Y-m-d");
           if($model->save()){
            Yii::info('Создание заметки', 'info');
            return Yii::$app->response->redirect('/site/index');
           }
        }

        $this->view->title = 'view';
        return $this->render('create',[
            'model'=>$model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Zam::find()->where('id=:id', [':id'=>$id])->one();
        $model->delete();
        Yii::info('Удаление заметки', 'info');
        return Yii::$app->response->redirect('/site/index');
    }

    public function actionSearch()
    {    
        if($search = Yii::$app->getRequest()->post('SearchForm')){
            $search = $search['search'];
            $query = Zam::find()->where(['like', 'content', $search])
                                ->where(['like', 'title', $search]);
     
        }

        if($search = Yii::$app->getRequest()->getQueryParam('search')){
            $query = Zam::find()->where(['like', 'content', $search])
                                ->where(['like', 'title', $search]);
     
        }

        if($search = Yii::$app->getRequest()->getQueryParam('autor')){
            $query = Zam::find()->where(['=', 'autor', $search]);
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 4
            ],
        ]);

        return $this->render('index',[
            'dataProvider'=>$provider,
        ]);
    }

    public function beforeAction($action)
    {
        $model = new SearchForm();
        if($model->load(Yii::$app->request->post())){
            $search = Html::encode($model->search);
            return $this->redirect(Yii::$app->urlManager->createUrl(['site/search', 'search'=>$search,] ));
        }
        return parent::beforeAction($action);
        //return true;
    }
}