<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "approval_level".
 *
 * @property int $id
 * @property string|null $level
 * @property string|null $description
 * @property string|null $name
 * @property int|null $createdAt
 * @property int|null $updatedAt
 *
 * @property ApprovalMapping[] $approvalMappings
 * @property RequestApproval[] $requestApprovals
 */
class ApprovalLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approval_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createdAt', 'updatedAt'], 'integer'],
            [['level', 'description', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level' => 'Level',
            'description' => 'Description',
            'name' => 'Name',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ApprovalMappings]].
     *
     * @return \yii\db\ActiveQuery|ApprovalMappingQuery
     */
    public function getApprovalMappings()
    {
        return $this->hasMany(ApprovalMapping::className(), ['approvalLevelId' => 'id']);
    }

    /**
     * Gets query for [[RequestApprovals]].
     *
     * @return \yii\db\ActiveQuery|RequestApprovalQuery
     */
    public function getRequestApprovals()
    {
        return $this->hasMany(RequestApproval::className(), ['approvalLevelId' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ApprovalLevelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApprovalLevelQuery(get_called_class());
    }
}
