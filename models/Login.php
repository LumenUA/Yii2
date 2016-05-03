<?php

namespace app\models;

use yii\base\Model;

/**
* 
*/
class Login extends Model
{
	public $email;
	public $password;


	public function rules()
	{
		return [

			[['email', 'password'], 'required'],
			['email', 'email'],
			['password', 'validatePassword'] // функция для валидации пароля
		];
	}
	public function validatePassword($attribute, $params)
	{
		if (!$this->hasErrors()) // если нет ошибок в валидации
		{
			$user = $this->getUser(); //получаем пользователя для сравнения пароля

			if (!$user || !$user->validatePassword($this->password)) 
			{
				//если такого пользователя нет
				//или пароль не вернеый
				$this->addError($attribute, 'Пароль или email введены неверно');
			}

		}
	}
	public function getUser()
	{
		return User::findOne(['email'=>$this->email]); //получаем его по введеному  имайлу
	}
}