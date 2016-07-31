<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 31/07/16
 * Time: 17:43
 */

namespace app\components\widgets;


use app\models\Languages;
use yii\base\Widget;
use app\models\Menu;
use Yii;

class MainMenuWidget extends Widget
{

    public function run()
    {
        $menu_content = '';
        $current_lang_id = Languages::getCurrentLngId();

        $cache_name = "main_menu_{$current_lang_id}";
        $menu_content = Yii::$app->cache->get($cache_name);
        if(empty($menu_content)){
            $menu = Menu::find()->with('trl')->asArray()->all();
            $menu_content = $this->render('main_menu', compact('menu'));

            Yii::$app->cache->set($cache_name,$menu_content,60);
        }

        return $menu_content;
    }


}