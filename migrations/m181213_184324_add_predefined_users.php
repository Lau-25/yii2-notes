<?php

use yii\db\Migration;

/**
 * Class m181213_184324_add_predefined_users
 */
class m181213_184324_add_predefined_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach (
            [
                'autor' => '1',
                'admin' => '2'
            ] as $username => $password
        ) {
            $user = new \app\models\user\UserRecord();
            $user->attributes = compact(varname:'username', _:'password');
            $user->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->delete(table:'user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181213_184324_add_predefined_users cannot be reverted.\n";

        return false;
    }
    */
}
