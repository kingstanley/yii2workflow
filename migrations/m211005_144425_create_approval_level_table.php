<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%approval_level}}`.
 */
class m211005_144425_create_approval_level_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%approval_level}}', [
          'id' => $this->primaryKey(),
            "level" => $this->string(255),
            'description' => $this->string(255),
            "name"=>$this->string(255),
            'createdAt' => $this->integer(),
            'updatedAt' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%approval_level}}');
    }
}
