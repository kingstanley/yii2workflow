<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $createdAt
 * @property int|null $updatedAt
 *
 * @property ApprovalMapping[] $approvalMappings
 * @property Request[] $requests
 * @property User[] $users
 */
class Department extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createdAt', 'updatedAt'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    public function behaviors() {
    return [
         [
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
     * Gets query for [[ApprovalMappings]].
     *
     * @return \yii\db\ActiveQuery|ApprovalMappingQuery
     */
    public function getApprovalMappings()
    {
        return $this->hasMany(ApprovalMapping::className(), ['departmentId' => 'id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery|RequestQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['departmentId' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['departmentId' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DepartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartmentQuery(get_called_class());
    }
}
