<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages_blocks".
 *
 * @property integer $id
 * @property integer $page_id
 * @property integer $type
 * @property string $label
 * @property integer $order
 */
class PagesBlocks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages_blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'type'], 'required'],
            [['page_id', 'type', 'order'], 'integer'],
            [['label'], 'string', 'max' => 255],
        ];
    }


    public function getTrl()
    {
        return $this->hasMany(PagesBlocksTrl::className(), ['block_id' => 'id'])
            ->where(['language_id' => Languages::getCurrentLngId()]);
    }


    public function getType()
    {
        return $this->hasOne(BlocksTypes::className(),['id' => 'type']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'type' => 'Type',
            'label' => 'Label',
            'order' => 'Order',
        ];
    }
}
