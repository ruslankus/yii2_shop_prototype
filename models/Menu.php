<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $label
 * @property integer $order
 */
class Menu extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order'], 'integer'],
            [['label'], 'string', 'max' => 255],
        ];
    }


    public function getTrl()
    {
        return $this->hasMany(MenuTrl::className(),['menu_id' => 'id'])
            ->where(['lang_id' => Languages::getCurrentLngId()]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'order' => 'Order',
        ];
    }
}
