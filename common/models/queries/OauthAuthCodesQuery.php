<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\OauthAuthCodes]].
 *
 * @see \common\models\OauthAuthCodes
 */
class OauthAuthCodesQuery extends \common\models\queries\BaseQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\OauthAuthCodes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\OauthAuthCodes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
