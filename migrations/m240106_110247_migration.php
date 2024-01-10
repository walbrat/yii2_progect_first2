<?php

use yii\db\Migration;

/**
 * Class m240106_110247_migration
 */
class m240106_110247_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string()->notNull(),
            'category' => $this->string()->notNull(),
            'createdAt' => $this->timestamp()->notNull(),
            'completedAt' => $this->timestamp(),
            'agent' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240106_110247_migration cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240106_110247_migration cannot be reverted.\n";

        return false;
    }
    */
}
