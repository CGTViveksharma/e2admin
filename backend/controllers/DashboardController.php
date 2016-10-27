<?php

namespace backend\controllers;
use Yii;
use backend\models\User;

class DashboardController extends \yii\web\Controller
{
            
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                // 'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
                    ],          
        ];
    }


    /**
     * show user dashboard
     * @return mixed
     */
    public function actionIndex()
    {
        
        $dashboard_widget = [
            'user_count' => User::find()->where("timestampdiff(DAY,from_unixtime(created_at,'%Y-%m-%d'),CURDATE()) < 7")->count()
        ];
        return $this->render('index',[
            'dashboard_widget' => (Object)$dashboard_widget
        ]);
    }

}
