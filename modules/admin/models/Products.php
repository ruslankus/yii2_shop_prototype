<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property integer $hit
 * @property integer $new
 * @property integer $sale
 */
class Products extends \yii\db\ActiveRecord
{

    /**
     * adding image field for uploading
     * images via Yii2images plugin
     * @property UploadedFile $image
     *
     */
    public $image;

    public $gallery = [];

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'hit', 'new', 'sale'], 'integer'],
            [['name', 'price'], 'required'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 3],

        ];
    }


    public function getCategory()
    {
        return $this->hasOne(Categories::className(),['id' => 'category_id']);
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'image' => 'Image',
            'gallery' => "Gellery",
            'hit' => 'Hit',
            'new' => 'New',
            'sale' => 'Sale',
        ];
    }



    public function upload()
    {
        if($this->validate()){
            $path = "upload/store";

            $full_path = $path . DIRECTORY_SEPARATOR . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($full_path);
            $this->attachImage($full_path,true);
            @unlink($full_path);
            return true;
        }else{
            return false;
        }
    }


    public function uploadGallery()
    {
        if($this->validate()){

            foreach ($this->gallery as $file){
                $path = "upload/store";
                $full_path = $path . DIRECTORY_SEPARATOR . $file->baseName . '.' . $file->extension;

                $file->saveAs($full_path);
                $this->attachImage($full_path);
                @unlink($full_path);
            }

        }else{
            return false;
        }

    }
}
