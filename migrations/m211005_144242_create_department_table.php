<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%department}}`.
 */
class m211005_144242_create_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%department}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'createdAt' => $this->integer()->defaultValue(time()),
            'updatedAt' => $this->integer()->defaultValue(time())
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%department}}');
    }
}
