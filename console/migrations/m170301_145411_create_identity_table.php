<?php

use yii\db\Migration;

/**
 * Handles the creation of table `identity`.
 */
class m170301_145411_create_identity_table extends Migration
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

        $this->createTable('identity', [
            'uuid' => $this->string(32)->notNull(),
            'username' => $this->string()->unique(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'PRIMARY KEY(uuid)'
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('identity');
    }
}
