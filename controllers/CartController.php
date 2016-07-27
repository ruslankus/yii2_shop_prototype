<?php

namespace app\controllers;

use app\models\Cart;
use app\models\OrderItems;
use app\models\Orders;
use app\models\Product;
use Yii;

class CartController extends AppController
{
    protected $_session;

    public function init()
    {
        $this->_session = $session = Yii::$app->session;
        $this->_session->open();
    }


    public function actionIndex()
    {
        return $this->redirect('view');
    }


    public function actionAdd()
    {

        $id = (int)Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = (empty($qty))? 1 : $qty;

        $product = Product::findOne($id);

        if(empty($product)){
            return false;
        }

        $cart = new Cart();
        $cart->addToCart($product, $qty);

        return $this->renderPartial('partials/_cart',['session' => $this->_session]);
    }



    public function actionClear()
    {

        $this->_session->remove('cart');
        $this->_session->remove('cart.qty');
        $this->_session->remove('cart.sum');

        return $this->renderPartial('partials/_cart',['session' => $this->_session]);
    }


    public function actionRemItem()
    {
        $id = (int)Yii::$app->request->get('id');

        if(empty($this->_session['cart'][$id])){
           return false;
        }

        $cart = new Cart();
        $cart->removeItem($id);

        return $this->renderPartial('partials/_cart',['session' => $this->_session]);
    }


    public function actionShow()
    {
        return $this->renderPartial('partials/_cart',['session' => $this->_session]);
    }


    public function actionView()
    {
        $order = new Orders();

        if($order->load(Yii::$app->request->post())){

            $order->qty = $this->_session['cart.qty'];
            $order->sum = $this->_session['cart.sum'];

            if($order->save()){

                $this->_saveOrderItems($this->_session['cart'], $order->id);

                Yii::$app->mailer->compose('order',['session' => $this->_session])
                    ->setFrom('test@test.ru')
                    ->setTo('ruslankus@yahoo.com')
                    ->setSubject('Your order')
                    ->send();

                Yii::$app->session->setFlash('success',"You order is accepted");

                $this->_session->remove('cart');
                $this->_session->remove('cart.sum');
                $this->_session->remove('cart.qty');

                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error',"Order's error");
            }
        }

        return $this->render('view',['session' => $this->_session, 'order' => $order]);
    }




    protected function _saveOrderItems(array $order_items, $order_id)
    {
        foreach ($order_items as $id => $item){

            $order_items_model = new OrderItems();
            $order_items_model->order_id = $order_id;
            $order_items_model->product_id = $id;
            $order_items_model->name = $item['name'];
            $order_items_model->price = $item['price'];
            $order_items_model->qty_item = $item['qty'];
            $order_items_model->save();
        }
    }
}