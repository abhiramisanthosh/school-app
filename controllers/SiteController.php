<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\SignupForm;
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

   

    public function actionSignup()
    {
        $model = new SignupForm();
 
        if ($model->load(Yii::$app->request->post())) {
            //$model->photo = UploadedFile::getInstance($model, 'image');
            if ($user = $model->signup()) {
                if ($model->upload()) {
                
                }
                Yii::$app->session->setFlash('success', Yii::t('app', 'Successful Created Please Login!'));
                return $this->goHome();
            }
            
          
        }
 
        return $this->render('signup', [
            'model' => $model,
        ]);
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

     public function actionCreate()
     {
        $model = new SignupForm();
 
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                   /*$this->render('index',array(

                        'dataProvider'=>$dataProvider,
                
                        'model'=>$model,
                
                    ));*/

                  //return $this->goHome();
                  return $this->render('student', [
                    'model' => $model,
                ]);
                }
            }
        }
 
        return $this->render('signup', [
            'model' => $model,
        ]);  
     }

     public function actionUpdate($id)
     {

        $model = User::findModel($id);
        
            if ($model->load(Yii::$app->request->post()) ) {
             $dob = $_POST['User']['dob'];
             //echo $dob;exit;
            //print_r($_POST['User']);
                $model->username = $_POST['User']['username'];
               // exit;
        $model->email = $_POST['User']['email'];
        $model->fname = $_POST['User']['fname']; 
        $model->lname =   $_POST['User']['lname'];
        $model->gender = $_POST['User']['gender'];
       
       $model->dob = date("y-m-d", strtotime($dob));
       
        if($model->save())
        {

        
                Yii::$app->session->setFlash('success', Yii::t('app', 'Successful update!'));
            return $this->render('index', array(
                'model' => $model
            ));
        }
        }
        
         return $this->render('update', array(
            'model' => $model
        ));
     }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            /*if ($model->validate()) {                
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }*/
            //$model->image = UploadedFile::getInstance($model, 'image');
            //if ($model->upload()) {
                // file is uploaded successfully
                //return;
            //}
            /*return $this->render('index', [
                'model' => $model,
            ]);*/
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

    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@devreadwrite.com';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
}
