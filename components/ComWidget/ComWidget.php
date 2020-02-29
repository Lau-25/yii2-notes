<?php 

namespace app\components\ComWidget;

use yii\base\Widget;

class ComWidget extends Widget
{
    public $params;

	public function init()
	{

    } 

	public function run()
	{
		return $this->render('view', ['params'=>$this->params]);
		
	}
}

 ?>