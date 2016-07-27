<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 22/07/16
 * Time: 12:15
 */

namespace app\models;


use yii\db\ActiveRecord;
use app\models\Product;

class Cart extends ActiveRecord
{

    public function addToCart(Product $product, $qtn = 1)
    {
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qtn;
        }else{
            $_SESSION['cart'][$product->id] = [
                'qty' => $qtn,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img
            ];
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty'])? $_SESSION['cart.qty'] += $qtn : $qtn;

        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum'])? $_SESSION['cart.sum'] += $qtn * $product->price
            : $qtn * $product->price;

    }



    public function removeItem($id)
    {
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['price'] * $qtyMinus;

        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;

        unset($_SESSION['cart'][$id]);

    }

}