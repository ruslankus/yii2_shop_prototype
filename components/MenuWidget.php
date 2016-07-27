<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 17/07/16
 * Time: 10:35
 */

namespace app\components;


use app\models\Category;
use yii\base\Widget;
use Yii;

class MenuWidget extends Widget
{
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if(empty($this->tpl))
        {
            $this->tpl = 'menu';
        }
    }

    public function run()
    {
        //get data from cache
        $menu = Yii::$app->cache->get('menu');

        if(!empty($menu)){
            return $menu;

        }else{

            $this->data = Category::find()->indexBy('id')->asArray()->all();
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);

            //set data to cache
            Yii::$app->cache->set('menu', $this->menuHtml, 60);

            return $this->menuHtml;
        }



    }

    public function getTree()
    {
        $tree = [];

        foreach ($this->data as $id => &$node)
        {
            if(!$node['parent_id'])
            {
                $tree[$id] = &$node;
            }else{
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }

        return $tree;
    }


    protected function getMenuHtml(array $tree)
    {
        $str = "";

        foreach ($tree as $category){
            $str .= $this->catToTemplate($category);
        }

        return $str;
    }

    protected function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . DIRECTORY_SEPARATOR.'menu_tpl'.DIRECTORY_SEPARATOR. $this->tpl . ".php";
        return ob_get_clean();
    }
}