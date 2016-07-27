<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */

use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();


    }


    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup', 'hash'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        //'actions' => ['logout'],
                        'roles' => ['@'],
                    ],

                ],

                //'denyCallback' => function () {
                //    return Yii::$app->response->redirect(['/admin/auth/login']);
                //},
            ],

        ];
    }

}//end Modeile
