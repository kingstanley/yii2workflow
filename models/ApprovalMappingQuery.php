<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ApprovalMapping]].
 *
 * @see ApprovalMapping
 */
class ApprovalMappingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ApprovalMapping[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ApprovalMapping|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
