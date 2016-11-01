<?php 
 namespace common\components;
use Yii;
use yii\base\Component;
use yii\web\Response;
use yii\bootstrap\Alert;
use yii\web\Controller;

class Helper extends Component{

/**
* return json encoded response data
*@param array $data
*@return json data 
*/

    public function JsonResponse($data){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;
    }

/**
* return rendered html for alert box
*@param array $data
*@return html 
*/
    public function renderErrors($data){
        $messages = "";
        foreach($data as $each){
            $messages .= implode(',',$each).'<br/>';
        }

        if($messages != ""){
            echo  '<div class="alert alert-danger">'.$messages.'</div>';
        }
    }


/**
* return formated date 
*@param string $date
*@return string date
*/
    public function formatToDefaultDate($date){
        return date('Y-m-d',strtotime($date));
    }

/**
* return rendered html for bootstrap alert
*@param string $key (flash message key)
*@param string $class (Bootstrap class)
*@return html 
*/
    public function showAlert($key, $class){
         if(Yii::$app->session->hasFlash($key)){
            return Alert::widget([
                'options' => ['class' => 'alert alert-'.$class],
                'body' => Yii::$app->session->getFlash($key)
            ]);
         }
    }
    
/**
* return rendered html for bootstrap success message
*@return html 
*/
    public function showSuccessMessage(){
         if(!empty(Yii::$app->session->getFlash('success_message'))){
            return Alert::widget([
                'options' => ['class' => 'alert alert-success'],
                'body' => Yii::$app->session->getFlash('success_message')
            ]);
         }
    }

        
/**
* set a flash message in success_message key
*@param string $message
*@return html 
*/
    public function setSuccessMessage($message){
         Yii::$app->session->setFlash('success_message',$message);
    }

/**
* set a flash message in error_message key
*@param string $message
*@return html 
*/
    public function setErrorMessage($message){
        if(is_object($message)){
            $errors = "";
            foreach($message->errors as $each){
                $errors .= implode(", ",$each).'</br>';
            }
            $message = $errors;
        }
        Yii::$app->session->setFlash('error_message',$message);
    }

/**
* return rendered html for bootstrap error message
*@return html 
*/
    public function showErrorMessage(){
         if(!empty(Yii::$app->session->getFlash('error_message'))){
            return Alert::widget([
                'options' => ['class' => 'alert alert-danger'],
                'body' => Yii::$app->session->getFlash('error_message')
            ]);
         }
    }

}
