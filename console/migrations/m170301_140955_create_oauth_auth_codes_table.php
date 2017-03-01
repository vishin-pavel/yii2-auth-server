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
        $this->createTable('oauth_auth_codes', [
            'uuid' => $this->string(32)->notNull(),
            'identity_uuid' => $this->string(32),
            'client_uuid' => $this->string(32)->notNull(),
            'scopes' => $this->text(),
            'revoked' => $this->boolean()->notNull()->defaultValue(0),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'expires_at' => $this->timestamp(),
            'PRIMARY KEY(uuid)'
        ]);

        $this->addForeignKey('fk_auth_code_identity', 'oauth_auth_codes', 'identity_uuid', 'identity', 'uuid');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_auth_code_identity', 'oauth_auth_codes');
        $this->dropTable('oauth_auth_codes');
    }
}
