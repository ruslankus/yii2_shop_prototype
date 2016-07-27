<?php

namespace app\controllers;

use app\models\Product;
use yii\web\HttpException;
use Yii;

class ProductController extends AppController
{
    public function actionView()
    {
        $id = (int)Yii::$app->request->get('id');

        $product = Product::findOne($id);
        if(empty($product)){
            throw new HttpException(404, "Product not found");
        }

        $this->setMeta($product->name, $product->keywords, $product->description);

        $hits = Product::find()->where(['hit' => true])->limit(6)->all();

        $hits_chunk = array_chunk($hits,3);

        return $this->render('view',compact('product','hits_chunk'));

    }
}