<?php 
namespace app\models;

use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
	public $verifyCode;

	public static function tableName()
	{
		return 'Comments';
	}

	public function rules()
	{
		return [
			[['com_autor', 'com_text'], 'required'],
			['verifyCode', 'captcha', 'captchaAction' => '/comment/captcha'],
		];
	}
}

 ?>