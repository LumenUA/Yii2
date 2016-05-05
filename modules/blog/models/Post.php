<?php

namespace app\modules\blog\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $username
 * @property string $post
 * @property string $textprewie
 * @property string $img
 */
class Post extends \yii\db\ActiveRecord
{
    public $image;
    public $filename;
    public $string;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post'], 'string'],
            [['textprewie'], 'required'],
            [['username'], 'string', 'max' => 50],
            [['textprewie'], 'string', 'max' => 250],
            [['username'], 'unique'],
            [['data'], 'string', 'max' => 11],
            // [['img'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            Yii::$app->user->identity->username => 'Username',
            'post' => 'Post',
            'textprewie' => 'TextPrewie',
            'img' => 'Img',
            'data' => 'Data',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) 
        {
            $this->string = substr(uniqid('img'), 0, 12);
            $this->image = UploadedFile::getInstance($this, 'img');
            $this->filename = 'uploads' . $this->string . '.' . $this->image->extension;
            $this->image->saveAs($this->filename);
            //save
            $this->img = '/uploads' . $this->filename;
        }else{
            $this->img = UploadedFile::getInstance($this, 'images');
            if ($this->img) {
                $this->img->saveAs(substr($this->img, 1));
            }
        }

        return parent::beforeSave($insert);
    }
}
