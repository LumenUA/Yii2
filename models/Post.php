<?php

namespace app\models;

use yii\base\Model;

/**
* 
*/
class Post extends Model
{
	public $posts;


	public function rules()
	{
		return [

			[['posts'], 'required'],
			['posts', 'posts']
		];
	}
	public function getPost()
	{
		return Post::findOne(['posts'=>$this->posts]); //получаем его по введеному  имайлу
	}
}