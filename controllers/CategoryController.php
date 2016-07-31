<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 17/07/16
 * Time: 17:44
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;
use yii\helpers\Html;

class CategoryController extends AppController
{

    public function init()
    {
        parent::init();
    }

    public function actionIndex()
    {
        $current_lang = $this->_current_lang;

        $hits = [];
        $hits = Yii::$app->cache->get('hits');

        if(empty($hits)){
            $hits = Product::find()->where(['hit' => true])->limit(6)->all();
            Yii::$app->cache->set('hits',$hits,60);
        }

        return $this->render('index',compact('hits', 'current_lang'));
    }



    public function actionView()
    {
        $id = (int)Yii::$app->request->get('id');

        $category = Category::findOne($id);
        if(empty($category)){
            throw new HttpException(404, "Category not found");
        }


        $query = Product::find()->where(['category_id' => $id]);

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'forcePageParam' => false,
            "pageSizeParam" => false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();


        //$products = $category->products;

        $this->setMeta("E-Shopper | {$category->name}", $category->keywords, $category->description);

        return $this->render('view',compact('products','category','pages'));
    }



    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));

        if(empty($q)){
            return $this->render('search', compact('q'));
        }

        $q = Html::encode($q);

        $query = Product::find()->where(['like','name', $q ]);

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'forcePageParam' => false,
            "pageSizeParam" => false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();


        //$products = $category->products;

        $this->setMeta("E-Shopper | {$q}");

        return $this->render('search',compact('products','pages','q'));
    }

}