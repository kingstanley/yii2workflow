<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 */
class m211005_144709_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            "title"=>$this->string(255),
            "description"=>'LONGTEXT',
            "requestor"=>$this->integer(),
            "currentApprovalLevel"=>$this->integer(),
            "approvalStatus"=>$this->string(255),
            "maxApprovalLevel"=>$this->integer(),
            "departmentId"=>$this->integer(),
            'createdAt' => $this->integer(),
            'updatedAt' => $this->integer()
        ]);

        
        $this->addForeignKey('FK_request_user', 'request', 'requestor', 'user', 'id');
        $this->addForeignKey('FK_request_department', 'request', 'departmentId', 'department', 'id');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
     
        $this->dropForeignKey('FK_request_user', 'request');
        $this->dropForeignKey('FK_request_department', 'request');
        $this->dropTable('{{%request}}');
    }
}
