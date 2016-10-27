<?php
namespace common\components;
use Yii;
use yii\db\Query;
use yii\web\Controller;

class Theming extends \yii\base\Component {

/**
*set theme accoding to selection
*/
   public function init() 
    {
            $query = new Query;
            $theme = $query->select('theme')->from('settings')->one();
            
            if ($theme['theme'] == 'basic') {
                $options = [
                    'pathMap' => ['@app/views' => '@web/views/'],
                    'baseUrl' => '@web',
                ];
            }
            else{
                $options = [
                    'pathMap' => ['@app/views' => '@app/themes/'.$theme['theme']],
                    'baseUrl' => '@web',
                ];
            }
            Yii::$app->view->theme = new \yii\base\Theme($options);
            return true;  // or false if needed

    }

}