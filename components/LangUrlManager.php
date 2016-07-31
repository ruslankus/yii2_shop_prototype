<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 31/07/16
 * Time: 13:54
 */

namespace app\components;

use yii\web\UrlManager;
use app\models\Languages;


class LangUrlManager extends UrlManager
{
    public function createUrl($params)
    {

        $url = parent::createUrl($params);

        /* if(!empty($params['lang_id']))
        {
            //getting language
            $lang = Languages::findOne($params['lang_id'])->toArray();
            if(empty($lang)){
                $lang = Languages::getDefaultLanguage();
            }

            unset($params['lang_id']);
        }else {
            $lang = Languages::getCurrentLanguage();
        }


        //getting url without prefix
        $url = parent::createUrl($params);

        if('/' == $url){
            return '/' . $lang['url'];
        }else{
            return '/' . $lang['url'] . $url;
        }*/

        return $url;
    }
}