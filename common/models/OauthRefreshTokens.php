<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "oauth_refresh_tokens".
 *
 * @property string $uuid
 * @property string $access_token_uuid
 * @property integer $revoked
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $expires_at
 *
 * @property OauthAccessTokens $accessTokenUu
 */
class OauthRefreshTokens extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_refresh_tokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uuid', 'created_at', 'updated_at', 'expires_at'], 'required'],
            [['revoked', 'created_at', 'updated_at', 'expires_at'], 'integer'],
            [['uuid', 'access_token_uuid'], 'string', 'max' => 32],
            [['access_token_uuid'], 'exist', 'skipOnError' => true, 'targetClass' => OauthAccessTokens::className(), 'targetAttribute' => ['access_token_uuid' => 'uuid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uuid' => 'Uuid',
            'access_token_uuid' => 'Access Token Uuid',
            'revoked' => 'Revoked',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'expires_at' => 'Expires At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessTokenUu()
    {
        return $this->hasOne(OauthAccessTokens::className(), ['uuid' => 'access_token_uuid']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\OauthRefreshTokensQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\OauthRefreshTokensQuery(get_called_class());
    }
}
