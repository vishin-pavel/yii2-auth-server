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
        $this->createTable('identity', [
            'uuid' => $this->string(32)->notNull(),
            'username' => $this->string()->unique(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'PRIMARY KEY(uuid)'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('identity');
    }
}
