<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Cookie;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\User;
use common\models\PasswordForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    // /**
    // *
    // *@return 
    // */
    
    //  public function beforeAction($action) 
    // {
    //     if (parent::beforeAction($action)) {
    //         $theme = "default";
    //         // if (Yii::$app->request->cookies['theme']) {
    //         //     $theme = Yii::$app->request->cookies->getValue('theme');
    //         // }
    //         Yii::$app->view->theme = new \yii\base\Theme([
    //             'pathMap' => ['@app/views' => '@web/views'],
    //             'baseUrl' => '@web',

    //         ]);
    //         return true;  // or false if needed
    //     } else {
    //         return false;
    //     }
    // }

    /**
     * @inheritdoc
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
     * @return mixed
     */
    public function actionIndex()
    {
        // echo \yii\helpers\Url::to('@app',true);exit;
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /*Request for profile view*/
    public function actionProfile()
    {
        $model = User::findByUsername(Yii::$app->user->identity->username);
        return $this->render('profile',['model'=>$model]);
    }

    /*Request for profile edit*/

    public function actionEditprofile()
    {
        $model = User::findByUsername(Yii::$app->user->identity->username);
        if($model->load(Yii::$app->request->post()))
        {
            $model->file = UploadedFile::getInstance($model,'file');
            if($model->file!='')
            {
                $imageName= $model->username;
                $model->image='uploads/user/'.$imageName.'.'.$model->file->extension;
                $model->save();                
                $model->file->saveAs('uploads/user/'.$imageName.'.'.$model->file->extension);
                return $this->redirect('profile');
            }
            else
            {
                $model->save();
                return $this->redirect('profile');
            }            
        }
        else
        {
            return $this->render('editprofile',['model'=>$model]);
        }
        
    }

    /* Requests for change password
     * calls Password form model to validate old pass, new pass and confirm pass
     * Then save the new password with success notification
    */

    public function actionChangepassword(){
        $model = new PasswordForm;
        $modeluser = User::findByUsername(Yii::$app->user->identity->username);
      
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                try{
                    
                    $modeluser->password = $model->newpass;
                    if($modeluser->save()){
                        Yii::$app->getSession()->setFlash(
                            'success','Password changed'
                        );
                        return $this->render('passwordmsg',['msg'=>'Your Password has been changed Succcessfully.','class'=>'alert-success']);
                    }else{
                        Yii::$app->getSession()->setFlash(
                            'error','Password not changed'
                        );
                        return $this->render('passwordmsg',['msg'=>'Opps! Some Technical error has occured.<br/> Please Try Again.','class'=>'alert-danger']);
                    }
                }catch(Exception $e){
                    Yii::$app->getSession()->setFlash(
                        'error',"{$e->getMessage()}"
                    );
                    return $this->render('changepassword',[
                        'model'=>$model
                    ]);
                }
            }
            else
            {
                return $this->render('changepassword',[
                    'model'=>$model
                ]);
            }
        }
        else
        {
            return $this->render('changepassword',[
                'model'=>$model
            ]);
        }
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

/**
*set preferred language for app selected by user
* we set cookie to determine language for each request
*@return cookie in response
*/

    public function actionLanguage(){
        $language = Yii::$app->request->post('language');
        Yii::$app->language = $language;

        $languageCookie = new Cookie([
            'name' => 'language',
            'value' => $language,
            'expire' => time() + 60 * 60 * 24 * 30, // 30 days
        ]);
        Yii::$app->response->cookies->add($languageCookie);
        return $this->goHome();
    }
}
