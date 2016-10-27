<?php
namespace common\components;
use yii\base\BootstrapInterface;

class LanguageSelector implements BootstrapInterface
{
    public $supportedLanguages = [];

    public function bootstrap($app)
    {
        //check for language in cookie 
        $preferredLanguage = isset($app->request->cookies['language']) ? (string)$app->request->cookies['language'] : null;

        //if not found in cookie let app to determine itself
        if(empty($preferredLanguage)){
            $preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
        }

        //set preferred language
        $app->language = $preferredLanguage;
    }
}