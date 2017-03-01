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

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('clients', [
            'uuid' => $this->string(32)->notNull(),
            'name' => $this->string(),
            'secret' => $this->string(100),
            'redirect' => $this->text(),
            'password_client' => $this->boolean(),
            'revoked' => $this->boolean()->notNull()->defaultValue(0),
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
        $this->dropTable('clients');
    }
}
