<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "oauth_access_tokens".
 *
 * @property string $uuid
 * @property string $identity_uuid
 * @property string $client_uuid
 * @property string $scopes
 * @property integer $revoked
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $expires_at
 *
 * @property Clients $clientUu
 * @property Identity $identityUu
 * @property OauthRefreshTokens[] $oauthRefreshTokens
 */
class OauthAccessTokens extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_access_tokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uuid', 'client_uuid', 'created_at', 'updated_at', 'expires_at'], 'required'],
            [['scopes'], 'string'],
            [['revoked', 'created_at', 'updated_at', 'expires_at'], 'integer'],
            [['uuid', 'identity_uuid', 'client_uuid'], 'string', 'max' => 32],
            [['client_uuid'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_uuid' => 'uuid']],
            [['identity_uuid'], 'exist', 'skipOnError' => true, 'targetClass' => Identity::className(), 'targetAttribute' => ['identity_uuid' => 'uuid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uuid' => 'Uuid',
            'identity_uuid' => 'Identity Uuid',
            'client_uuid' => 'Client Uuid',
            'scopes' => 'Scopes',
            'revoked' => 'Revoked',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'expires_at' => 'Expires At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientUu()
    {
        return $this->hasOne(Clients::className(), ['uuid' => 'client_uuid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentityUu()
    {
        return $this->hasOne(Identity::className(), ['uuid' => 'identity_uuid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthRefreshTokens()
    {
        return $this->hasMany(OauthRefreshTokens::className(), ['access_token_uuid' => 'uuid']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\OauthAccessTokensQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\OauthAccessTokensQuery(get_called_class());
    }
}
