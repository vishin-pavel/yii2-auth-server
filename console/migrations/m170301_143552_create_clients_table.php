<?php

use yii\db\Migration;

/**
 * Handles the creation of table `clients`.
 */
class m170301_143552_create_clients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('clients', [
            'uuid' => $this->string(32)->notNull(),
            'name' => $this->string(),
            'secret' => $this->string(100),
            'redirect' => $this->text(),
            'password_client' => $this->boolean(),
            'revoked' => $this->boolean()->notNull()->defaultValue(0),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'PRIMARY KEY(uuid)'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('clients');
    }
}
