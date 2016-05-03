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
	public $username;


	public function rules()
	{
		return [

			[['email', 'password', 'username'], 'required'],
			['email', 'email'],
			['username', 'validatePassword'],
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
		return User::findOne(['username'=>$this->username]); //получаем его по введеному  имайлу
	}
}