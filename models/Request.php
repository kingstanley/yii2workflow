<?php

namespace app\models;

use Yii; 

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $requestor
 * @property int|null $currentApprovalLevel
 * @property string|null $approvalStatus
 * @property int|null $maxApprovalLevel
 * @property int|null $departmentId
 * @property int|null $createdAt
 * @property int|null $updatedAt
 *
 * @property Department $department
 * @property RequestApproval[] $requestApprovals
 * @property User $requestor0
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['requestor', 'currentApprovalLevel', 'maxApprovalLevel', 'departmentId', 'createdAt', 'updatedAt'], 'integer'],
            [['title', 'approvalStatus'], 'string', 'max' => 255],
            [['departmentId'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['departmentId' => 'id']],
            [['requestor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['requestor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'requestor' => 'Requestor',
            'currentApprovalLevel' => 'Current Approval Level',
            'approvalStatus' => 'Approval Status',
            'maxApprovalLevel' => 'Max Approval Level',
            'departmentId' => 'Department ID',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }



    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery|DepartmentQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'departmentId']);
    }

    /**
     * Gets query for [[RequestApprovals]].
     *
     * @return \yii\db\ActiveQuery|RequestApprovalQuery
     */
    public function getRequestApprovals()
    {
        return $this->hasMany(RequestApproval::className(), ['requestId' => 'id']);
    }

    /**
     * Gets query for [[Requestor0]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getRequestor0()
    {
        return $this->hasOne(User::className(), ['id' => 'requestor']);
    }

    /**
     * {@inheritdoc}
     * @return RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }

    public function getShortDescription() {
     return \yii\helpers\StringHelper::truncateWords($this->description, 30,'...');
    }
}
