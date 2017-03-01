<?php

use yii\db\Migration;

/**
 * Handles the creation of table `access_token`.
 */
class m170301_075046_create_oauth_access_tokens_table extends Migration
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

        $this->createTable('oauth_access_tokens', [
            'uuid' => $this->string(32)->notNull(),
            'identity_uuid' => $this->string(32),
            'client_uuid' => $this->string(32)->notNull(),
            'scopes' => $this->text(),
            'revoked' => $this->boolean()->notNull()->defaultValue(0),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'expires_at' => $this->timestamp(),
            'PRIMARY KEY(uuid)'
        ], $tableOptions);
        $this->addForeignKey('fk_access_token_identity', 'oauth_access_tokens', 'identity_uuid', 'identity', 'uuid');
        $this->addForeignKey('fk_access_token_client', 'oauth_access_tokens', 'client_uuid', 'client', 'uuid');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_access_token_identity', 'oauth_access_tokens');
        $this->dropForeignKey('fk_access_token_client', 'oauth_access_tokens');
        $this->dropTable('oauth_access_tokens');
    }
}
