<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Signup;
use app\models\Login;
use app\models\MyList;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class SiteController extends Controller
{   
        public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = MyList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionIndex()
    {
        $array = MyList::getAll();
        return $this->render('index',['model'=>$array]);
        // $var = 'Моя страница';
        // $array = MyList::getAll();
        // return $this->render('index', ['arrayInView'=>$array]);
        // return $this->render('index');
    }
    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest) 
        {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }
    public function actionSignup()
    {
        $model = new Signup();

        if (isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');
            if ($model->validate() && $model->signup()) 
            {
                return $this->goHome();
            }
        }

        return $this->render('signup', ['model'=>$model]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }
        $login_model = new Login();

        if (Yii::$app->request->post('Login')) 
        {
            $login_model->attributes = Yii::$app->request->post('Login');
            
            if ($login_model->validate()) 
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }
        return $this->render('login', ['login_model'=>$login_model]);
    }

    public function actionCreate()
    {
        $model = new MyList();

        if ($_POST['MyList']) {
            $model->post = $_POST['MyList']['post'];
            $model->textprewie = $_POST['MyList']['textprewie'];
            $model->img = $_POST['MyList']['img'];
            $model->username = Yii::$app->user->identity->username;
            if ($model->validate() && $model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('create',['model'=>$model]);
    }
}
