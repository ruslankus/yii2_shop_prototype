<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 16/07/16
 * Time: 10:17
 */

namespace app\assets;



use yii\web\AssetBundle;
use yii\web\View;

class IeAssets extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js'
    ];

    public $jsOptions = [
        'condition' => 'lte IE9',
        'position' => View::POS_HEAD
    ];

}