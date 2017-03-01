<?php

use yii\db\Migration;

class m170301_154131_fk extends Migration
{
    public function up()
    {
        $this->addForeignKey('fk_access_token_identity', 'oauth_access_tokens', 'identity_uuid', 'identity', 'uuid');
        $this->addForeignKey('fk_access_token_client', 'oauth_access_tokens', 'client_uuid', 'clients', 'uuid');
        $this->addForeignKey('fk_auth_code_identity', 'oauth_auth_codes', 'identity_uuid', 'identity', 'uuid');
        $this->addForeignKey('fk_refresh_token_access_token', 'oauth_refresh_tokens', 'access_token_uuid', 'oauth_access_tokens', 'uuid');
    }

    public function down()
    {
        $this->dropForeignKey('fk_access_token_identity', 'oauth_access_tokens');
        $this->dropForeignKey('fk_access_token_client', 'oauth_access_tokens');
        $this->dropForeignKey('fk_auth_code_identity', 'oauth_auth_codes');
        $this->dropForeignKey('fk_refresh_token_access_token', 'oauth_refresh_tokens');

        return true;
    }
}
