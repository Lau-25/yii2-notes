<?php 
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends \yii\db\ActiveRecord implements IdentityInterface
{
	public static function tableName()
	{
		return 'user';
	}

	public function rules()
	{
		return [

		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Имя',
			'login' => 'Логин',
			'password' => 'Пароль'
		];
	}

	public static function findIdentity($id)
	{
		return User::findOne($id);
	}

	public function getId()
	{
		return $this->id;
	}

	public function getAuthKey()
	{

	}

	public function validateAuthKey($key)
	{

	}

	public static function findIdentityByAccessToken($token, $type=null)
	{

	}

	public static function findByUsername($username)
	{
		return User::find()->where(['name' => $username])->one();
	}

	public function validatePassword ($password)
	{
		return ($this->password == $password) ? true : false;
	}
}
 ?>
