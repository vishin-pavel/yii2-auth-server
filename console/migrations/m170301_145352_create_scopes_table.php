<?php

use yii\db\Migration;

/**
 * Handles the creation of table `scopes`.
 */
class m170301_145352_create_scopes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('scopes', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'description' => $this->text(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
        $this->createIndex('idx_scopes', 'scopes', 'name');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex('idx_scopes', 'scopes');
        $this->dropTable('scopes');
    }
}
