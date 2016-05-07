<?php
/**
* 
*/
namespace app\models;
use Yii;
use yii\web\UploadedFile;
class MyList extends \yii\db\ActiveRecord
{

    public $image;
    public $filename;
    public $string;
    
	public function rules()
	{
		return[
			[['post', 'username'], 'required'],
		];
	}

	public static function tableName()
	{
		return 'post';
	}

	
	public static function getAll()
	{
		$data = self::find()
			->all();
		return $data;
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
            $this->img = '/' . $this->filename;
        }else{
            $this->img = UploadedFile::getInstance($this, 'images');
            if ($this->img) {
                $this->img->saveAs(substr($this->img, 1));
            }
        }

        return parent::beforeSave($insert);
    }
}