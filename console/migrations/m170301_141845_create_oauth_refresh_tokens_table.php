<?php

use yii\db\Migration;

/**
 * Handles the creation of table `oauth_refresh_token`.
 */
class m170301_141845_create_oauth_refresh_tokens_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('oauth_refresh_tokens', [
            'uuid' => $this->string(32)->notNull(),
            'access_token_uuid' => $this->string(32),
            'revoked' => $this->boolean()->notNull()->defaultValue(0),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'expires_at' => $this->timestamp(),
            'PRIMARY KEY(uuid)'
        ]);
        $this->addForeignKey('fk_refresh_token_access_token', 'oauth_refresh_tokens', 'user_uuid', 'user', 'uuid');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_refresh_token_access_token', 'oauth_refresh_tokens');
        $this->dropTable('oauth_refresh_tokens');
    }
}
