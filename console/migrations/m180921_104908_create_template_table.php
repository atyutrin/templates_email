<?php

use yii\db\Migration;

/**
 * Handles the creation of table `template`.
 */
class m180921_104908_create_template_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('template', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'file_name' => $this->string()->notNull(),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('NOW()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('template');
    }
}
