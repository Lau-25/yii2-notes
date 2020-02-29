<?php 

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Comment;

class Zam extends ActiveRecord
{
	public static function tableName()
	{
		return 'zam_table';
	}

	public function attributeLabels()
	{
		return [
			'title'=>'Название заметки :',
			'autor'=>'Автор заметки :',
			'content'=>'Содержание заметки :',
			'time'=>'Дата :'
		];
	}

	public function rules()
	{
		return [
			[['title', 'autor','content'], 'required', 'message' => 'Заполните поле' ]
		];
	}

	public function getComment()
	{
		return $this->hasMany(Comment::className(), ['id_zam'=>'id']);
	}
}

?>