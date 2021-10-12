<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $fullName
 * @property string|null $password
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property int|null $departmentId
 * @property int|null $createdAt
 * @property int|null $updatedAt
 *
 * @property ApprovalMapping[] $approvalMappings
 * @property Department $department
 * @property RequestApproval[] $requestApprovals
 * @property Request[] $requests
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{

     private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departmentId', 'createdAt', 'updatedAt'], 'integer'],
            [['username', 'fullName', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['departmentId'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['departmentId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'fullName' => 'Full Name',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'departmentId' => 'Department ID',
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
     * Gets query for [[ApprovalMappings]].
     *
     * @return \yii\db\ActiveQuery|ApprovalMappingQuery
     */
    public function getApprovalMappings()
    {
        return $this->hasMany(ApprovalMapping::className(), ['userId' => 'id']);
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
        return $this->hasMany(RequestApproval::className(), ['approvalPersonId' => 'id']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery|RequestQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['requestor' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

/**
 * Validate password for login
 */
public function validatePassword($password) {
return Yii::$app->getSecurity()->validatePassword($password, $this->password);
}

 
public function beforeSave($insert) {
if ($insert) {
$this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
}

return parent::beforeSave($insert);
}
public static function findIdentityByAccessToken($token, $type = null)
 {

 }
public static function findByUsername($username) {
return User::find()->where(['username' => $username])->one();
}
public function getAuthKey() { }
public function validateAuthKey($authKey) { }
public function getId() {
     return $this->id;
 }
public static function findIdentity($id) {
return User::findOne($id);
}
}
