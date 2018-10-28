<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $news = \app\models\News::find()->limit(3)->orderBy('date DESC')->all();
        $bible = \app\models\Bible::find()->limit(1)->orderBy('rand')->select('*, rand() as rand')->all();
        return $this->render('index',[
            'bible'=>$bible,
            'news'=>$news
        ]);
    }
    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionAdmin()
    {
        $param = Yii::$app->request->getQueryParam("action");
        switch ($param){
            case "createNewUser":
                $model = new \app\models\User();

                if ($model->load(Yii::$app->request->post())) {
                    if ($model->validate()) {
                        $model->signup();
                        return $this->render('UserW', [
                            'model' => $model,
                            'addition' => 'Користувач успішно створений.'
                        ]);
                    }
                }
                return $this->render('UserW', [
                    'model' => $model,
                    'addition' => null
                ]);
            case "createNewMedia":
                /*Что то не робит*/
                $model = new \app\models\Media();
                if ($model->load(Yii::$app->request->post())) {
                    $model->con = UploadedFile::getInstance($model, 'con');
                    if ($model->upload()) {
                        $this->render('MediaW', [
                            'model' => $model,
                            'succes'=>'true'
                        ]);
                    }
                }
                return $this->render('MediaW', [
                    'model' => $model,
                    'succes'=>'nautral'
                ]);
            case "showAllUsers":
                $page = Yii::$app->request->getQueryParam("p")!=null ? Yii::$app->request->getQueryParam("p") : 0;
                $offset = 2;
                $users = new \app\models\User();
                $count = Yii::$app->db->createCommand('SELECT COUNT(*)FROM User;')->queryScalar();
                $useres = $users->find()->limit($offset)->offset($page * $offset)->all();
                $pages_num = (int)$count/$offset;
                $point = "";
                if($page != 0){
                    $point .= "<a class='btn btn-lg btn-success' href='?action=showAllUsers&p=0'>1</a>";
                }
                for($i = $page; $i < 5 + $page && $i < $pages_num ; $i++){
                    $point .= "<a class='btn btn-lg btn-success' href='?action=showAllUsers&p=$i'>".($i+1)."</a>";
                }
                if($page+5<$pages_num){
                    $point .= "<a class='btn btn-lg btn-success' href='?action=showAllUsers&p=".($pages_num-1)."'>".($pages_num)."</a>";
                }
                return $this->render('adminUsers', [
                    'users'=>$useres,
                    'point'=>$point
                ]);
            case "deleteUser":
                $ide = Yii::$app->request->getQueryParam("id");
                \app\models\User::deleteAll(['id'=>$ide]);
                return $this->render('admin');
            default:
                return $this->render('admin');
        }
    }
        
    public function actionPartitura()
    {
        $idPartitura = Yii::$app->request->getQueryParam("id");
        if($idPartitura != null){
        $media = \app\models\Media::find()->where("referenceIdPartitura='$idPartitura'")->all();
        $partitura = \app\models\Partitura::find()->where("id='$idPartitura'")->all();
        return $this->render('partitura',['media'=>$media,'partitura'=>$partitura,'partituras'=>null]);
        }else{
            return $this->render('partitura',['media'=>null,'partitura'=>null,'partituras'=> \app\models\Partitura::find()->all()]);
        }
    }
}
