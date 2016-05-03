<?php
namespace app\models;

use yii\base\Model;

/**
* 
*/
class Signup extends Model
{
	public $email;
	public $password;
	public $username;

	public function rules()
	{
		return [

			[['email', 'password', 'username'], 'required'],
			['email', 'email'],
			['username', 'unique', 'targetClass'=>'app\models\User'],
			['username', 'string', 'min'=>2, 'max'=>10],
			['password', 'string', 'min'=>2, 'max'=>10]
		];
	}

	public function signup()
	{
		$user = new User();
		$user->email = $this->email;
		$user->username = $this->username;
		$user->setPassword($this->password);
		return $user->save();
	}
}

?>