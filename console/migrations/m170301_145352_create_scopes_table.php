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

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('scopes', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
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
