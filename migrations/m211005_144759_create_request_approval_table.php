<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request_approval}}`.
 */
class m211005_144759_create_request_approval_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->createTable('{{%request_approval}}', [
            'id' => $this->primaryKey(),
            "requestId" => $this->integer(),
            "approvalLevelId"=> $this->integer(),
            "approvalPersonId"=> $this->integer(),
            "approvalStatus"=> $this->string(255),
            'createdAt' => $this->integer(),
            'updatedAt' => $this->integer()
       ]);

        $this->addForeignKey('FK_request_approval_request', 'request_approval', 'requestId', 'request', 'id');
        $this->addForeignKey('FK_request_approval_approval_level', 'request_approval', 'approvalLevelId', 'approval_level', 'id');
         $this->addForeignKey('FK_request_approval_user', 'request_approval', 'approvalPersonId', 'user', 'id');
        
    }
}
