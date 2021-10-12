<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%approval_mapping}}`.
 */
class m211005_144518_create_approval_mapping_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {  
        $this->createTable('{{%approval_mapping}}', [
           'id' => $this->primaryKey(),
            "userId"=>$this->integer(),
            "departmentId" => $this->integer(),
            "approvalLevelId" => $this->integer(),
            'createdAt' => $this->integer(),
            'updatedAt' => $this->integer()
        ]);
        $this->addForeignKey('FK_approval_user', 'approval_mapping', 'userId', 'user', 'id');
        $this->addForeignKey('FK_approval_department', 'approval_mapping', 'departmentId', 'department', 'id');
        $this->addForeignKey('FK_approval_approval_level', 'approval_mapping', 'approvalLevelId', 'approval_level', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addForeignKey('FK_approval_user', 'approval_mapping', );
        $this->addForeignKey('FK_approval_department', 'approval_mapping');
        $this->addForeignKey('FK_approval_approval_level', 'approval_mapping');
        $this->dropTable('{{%approval_mapping}}');
    }
}
