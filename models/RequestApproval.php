<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request_approval".
 *
 * @property int $id
 * @property int|null $requestId
 * @property int|null $approvalLevelId
 * @property int|null $approvalPersonId
 * @property string|null $approvalStatus
 * @property int|null $createdAt
 * @property int|null $updatedAt
 *
 * @property ApprovalLevel $approvalLevel
 * @property User $approvalPerson
 * @property Request $request
 */
class RequestApproval extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_approval';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['requestId', 'approvalLevelId', 'approvalPersonId', 'createdAt', 'updatedAt'], 'integer'],
            [['approvalStatus'], 'string', 'max' => 255],
            [['approvalLevelId'], 'exist', 'skipOnError' => true, 'targetClass' => ApprovalLevel::className(), 'targetAttribute' => ['approvalLevelId' => 'id']],
            [['requestId'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['requestId' => 'id']],
            [['approvalPersonId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['approvalPersonId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requestId' => 'Request ID',
            'approvalLevelId' => 'Approval Level ID',
            'approvalPersonId' => 'Approval Person ID',
            'approvalStatus' => 'Approval Status',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ApprovalLevel]].
     *
     * @return \yii\db\ActiveQuery|ApprovalLevelQuery
     */
    public function getApprovalLevel()
    {
        return $this->hasOne(ApprovalLevel::className(), ['id' => 'approvalLevelId']);
    }

    /**
     * Gets query for [[ApprovalPerson]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getApprovalPerson()
    {
        return $this->hasOne(User::className(), ['id' => 'approvalPersonId']);
    }

    /**
     * Gets query for [[Request]].
     *
     * @return \yii\db\ActiveQuery|RequestQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'requestId']);
    }

    /**
     * {@inheritdoc}
     * @return RequestApprovalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestApprovalQuery(get_called_class());
    }
}
