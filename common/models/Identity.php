<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "identity".
 *
 * @property string $uuid
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OauthAccessTokens[] $oauthAccessTokens
 * @property OauthAuthCodes[] $oauthAuthCodes
 */
class Identity extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'identity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uuid', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['uuid'], 'string', 'max' => 32],
            [['username', 'password_hash', 'email'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uuid' => 'Uuid',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAccessTokens()
    {
        return $this->hasMany(OauthAccessTokens::className(), ['identity_uuid' => 'uuid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAuthCodes()
    {
        return $this->hasMany(OauthAuthCodes::className(), ['identity_uuid' => 'uuid']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\IdentityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\IdentityQuery(get_called_class());
    }
}
