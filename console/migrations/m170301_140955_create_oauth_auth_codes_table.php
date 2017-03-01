<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oauth_auth_codes`.
 */
class m170301_140955_create_oauth_auth_codes_table extends Migration
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

        $this->createTable('oauth_auth_codes', [
            'uuid' => $this->string(32)->notNull(),
            'identity_uuid' => $this->string(32),
            'client_uuid' => $this->string(32)->notNull(),
            'scopes' => $this->text(),
            'revoked' => $this->boolean()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'expires_at' => $this->integer()->notNull(),
            'PRIMARY KEY(uuid)'
        ], $tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('oauth_auth_codes');
    }
}
