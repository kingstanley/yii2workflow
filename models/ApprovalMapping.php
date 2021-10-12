<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "approval_mapping".
 *
 * @property int $id
 * @property int|null $userId
 * @property int|null $departmentId
 * @property int|null $approvalLevelId
 * @property int|null $createdAt
 * @property int|null $updatedAt
 *
 * @property ApprovalLevel $approvalLevel
 * @property Department $department
 * @property User $user
 */
class ApprovalMapping extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approval_mapping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'departmentId', 'approvalLevelId', 'createdAt', 'updatedAt'], 'integer'],
            [['approvalLevelId'], 'exist', 'skipOnError' => true, 'targetClass' => ApprovalLevel::className(), 'targetAttribute' => ['approvalLevelId' => 'id']],
            [['departmentId'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['departmentId' => 'id']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'departmentId' => 'Department ID',
            'approvalLevelId' => 'Approval Level ID',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

public function behaviors() {
    return [ [
        'class' => TimestampBehavior::className(),
        'attributes' => [
        ActiveRecord::EVENT_BEFORE_INSERT => ['createdAt',
        'updatedAt'],
        ActiveRecord::EVENT_BEFORE_UPDATE => ['updatedAt'],
    ],
],
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
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery|DepartmentQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'departmentId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * {@inheritdoc}
     * @return ApprovalMappingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApprovalMappingQuery(get_called_class());
    }
}
