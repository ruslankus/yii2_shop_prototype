<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 01/08/16
 * Time: 11:18
 */

namespace app\controllers;


use app\models\Languages;
use app\models\Pages;

class PagesController extends AppController
{

    public function actionIndex()
    {

        $content_data_array = [];

        $pages_id = \Yii::$app->request->get('id');
        $pages_id = empty($pages_id)? 1 : $pages_id;

        $cache_name = "page_{$pages_id}_" . Languages::getCurrentLngId();

        $content_data_array = \Yii::$app->cache->get($cache_name);

        if(empty($content_data_array)){

            $page_blocks_array = Pages::find()->where(['id' => $pages_id])
                ->with('blocksTrl')
                ->asArray()
                ->one();


            foreach ($page_blocks_array['blocksTrl'] as $block){

                $block_type = $block['type']['label'];

                $method = '_get' . ucfirst($block_type);

                $content_data_array[] =  $this->$method();
            }



            \Yii::$app->cache->set($cache_name, $content_data_array,60);

        }

        return $this->render('content', compact('content_data_array'));
    }




    private function _getHtml()
    {
        return $this->renderPartial('pages_blocks/_html');
    }


    private function _getForm()
    {
        return $this->renderPartial('pages_blocks/_form');
    }


    private function _getWidget()
    {
        return $this->renderPartial('pages_blocks/_widget');
    }

}