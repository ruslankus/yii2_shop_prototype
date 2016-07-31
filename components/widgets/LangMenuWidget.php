<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 31/07/16
 * Time: 17:43
 */

namespace app\components\widgets;


use yii\base\Widget;

use app\models\Languages;
use Yii;

class LangMenuWidget extends Widget
{


    public function run()
    {
        $cleaned_url = "";
        $languages = [];
        $languages = Yii::$app->cache->get('lang_menu');
        if(empty($languages)){
            $languages = Languages::find()->asArray()->all();
            Yii::$app->cache->set('lang_menu',$languages, 360);
        }

        //getting current language
        $current_lang = Yii::$app->session->get('current_language');
        // getting current url
        $request = Yii::$app->getRequest();

        //$url_script = $request->getScriptUrl();
        $url = $request->getUrl();

        //remove / from end url if it exist
        $url = rtrim($url,'/');

        $parsed_url = explode('/', $url);

        if(count($parsed_url) > 2){
            unset($parsed_url[0], $parsed_url[1]);
            $cleaned_url = implode('/', $parsed_url);
        }



        return $this->render('lang_menu', compact('languages','current_lang', 'cleaned_url'));
    }

}