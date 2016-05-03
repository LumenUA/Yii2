<?php
/**
* 
*/
namespace app\models;

class MyList extends \yii\db\ActiveRecord
{

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
}