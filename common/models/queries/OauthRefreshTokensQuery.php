<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\OauthRefreshTokens]].
 *
 * @see \common\models\OauthRefreshTokens
 */
class OauthRefreshTokensQuery extends \common\models\queries\BaseQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\OauthRefreshTokens[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\OauthRefreshTokens|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
