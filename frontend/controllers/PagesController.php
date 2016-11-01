<?php

namespace frontend\controllers;

use Yii;
use common\models\Pages;

class PagesController extends \yii\web\Controller
{
    /**
    *render static pages which has active status
    *@return rendered page
    */
    public function actionIndex($seoname){
        if(!empty($seoname)){
            $model = Pages::find()->where(['seoname' => $seoname])->one();
            
            return $this->renderPartial('static',[
                'model' => $model
            ]);
        }
    }
}
