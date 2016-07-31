<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $id
 * @property string $url
 * @property string $locale
 * @property string $name
 * @property integer $default
 * @property string $date_update
 * @property string $date_create
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'locale', 'name'], 'required'],
            [['default'], 'integer'],
            [['date_update', 'date_create'], 'safe'],
            [['url'], 'string', 'max' => 2],
            [['locale'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'locale' => 'Locale',
            'name' => 'Name',
            'default' => 'Default',
            'date_update' => 'Date Update',
            'date_create' => 'Date Create',
        ];
    }
}
