<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\OauthAccessTokens]].
 *
 * @see \common\models\OauthAccessTokens
 */
class OauthAccessTokensQuery extends \common\models\queries\BaseQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\OauthAccessTokens[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\OauthAccessTokens|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
