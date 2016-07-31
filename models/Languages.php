<?php

namespace app\models;

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
    // current language
    static $current = [];



    static function getCurrentLanguage()
    {
        if(null === self::$current){
            self::$current = self::getCurrentLanguage();
        }

        return self::$current;
    }


    static function getCurrentLngId()
    {
        return self::getCurrentLanguage()['id'];
    }


    public static function setCurrentLang($url = null)
    {
        $language = self::getLangByUrl($url);
        self::$current = !empty($language) ? $language->toArray() : self::getDefaultLanguage()->toArray();
        //setting locale
        Yii::$app->language = self::$current['locale'];
        //setting data to session
        Yii::$app->session->set('current_language', self::$current);
    }



    public static function getDefaultLanguage()
    {
        return self::find()->where(['default' => true])->one();
    }



    public static function getLangByUrl($url = null)
    {
        if(null === $url){
            return null;
        }else {

            $language = self::find()->where(['url' => $url])->one();
            return !empty($language)? $language : null;
        }
    }


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
