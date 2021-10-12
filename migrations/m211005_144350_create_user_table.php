<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m211005_144350_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
           'id' => $this->primaryKey(),
            'username' => $this->string(255),
            "fullName"=> $this->string(255),
            'password' => $this->string(255),
            'authKey' => $this->string(255),
            'accessToken' => $this->string(),
            'departmentId' => $this->integer(require:true),
            'createdAt' => $this->integer(),
            'updatedAt' => $this->integer()
        ]);
        
        $this->addForeignKey('FK_user_department', 'user', 'departmentId', 'department', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_user_department', 'user');
        $this->dropTable('{{%user}}');
    }
}
