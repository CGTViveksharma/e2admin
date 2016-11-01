<?php

namespace backend\controllers;

use Yii;
use common\models\Settings;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
* SettingsController implements the CRUD actions for Settings model.
*/
class SettingsController extends Controller
{
    /**
    * @inheritdoc
    */
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
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index','create','update','view','delete'],
                'rules' => [
                    // admin and sub_admin  is allowed for all actions
                    [
                        'allow' => true,
                        'roles' => ['admin','sub_admin'],
                    ],
                ],
        ],
        ];
    }
    
    /**
    * Lists all Settings models.
    * @return mixed
    */
    public function actionIndex()
    {
        $model = !empty(Settings::find()->one()) ?  Settings::find()->one() : new Settings();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->helper->setSuccessMessage('Success! settings saved.');
            $this->redirect('index');
        }
        else{
            Yii::$app->helper->setErrorMessage($model);
        }
    
        return $this->render('settings', [
        'model' => $model,
        'themes' => \backend\models\Themes::find()->all(),
        ]);
    }

}