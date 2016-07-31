<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_trl".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $menu_id
 * @property string $menu_text
 */
class MenuTrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_trl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id', 'menu_id'], 'required'],
            [['lang_id', 'menu_id'], 'integer'],
            [['menu_text'], 'string', 'max' => 255],
        ];
    }


    public function getMenuItem()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang_id' => 'Lang ID',
            'menu_id' => 'Menu ID',
            'menu_text' => 'Menu Text',
        ];
    }
}
