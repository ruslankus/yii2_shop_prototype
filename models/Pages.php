<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $label
 * @property integer $order
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
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


    public function getBlocks()
    {
        return $this->hasMany(PagesBlocks::className(), ['page_id' => 'id']);
    }

    public function getBlocksTrl()
    {
        return $this->hasMany(PagesBlocks::className(), ['page_id' => 'id'])
            ->with('trl', 'type');
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
