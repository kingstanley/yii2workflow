<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RequestApproval]].
 *
 * @see RequestApproval
 */
class RequestApprovalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RequestApproval[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RequestApproval|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
