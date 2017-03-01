<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property string $uuid
 * @property string $name
 * @property string $secret
 * @property string $redirect
 * @property integer $password_client
 * @property integer $revoked
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OauthAccessTokens[] $oauthAccessTokens
 */
class Clients extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uuid', 'created_at', 'updated_at'], 'required'],
            [['redirect'], 'string'],
            [['password_client', 'revoked', 'created_at', 'updated_at'], 'integer'],
            [['uuid'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 255],
            [['secret'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uuid' => 'Uuid',
            'name' => 'Name',
            'secret' => 'Secret',
            'redirect' => 'Redirect',
            'password_client' => 'Password Client',
            'revoked' => 'Revoked',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOauthAccessTokens()
    {
        return $this->hasMany(OauthAccessTokens::className(), ['client_uuid' => 'uuid']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\ClientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ClientsQuery(get_called_class());
    }
}
