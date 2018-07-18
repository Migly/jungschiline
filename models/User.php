<?php
namespace app\models;

/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property string $username
 * @property string $passwordHash
 * @property int $member_id
 *
 * @property Member $member
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
    public static function tableName() {
        return 'User';
    }

    public function rules() {
        return [
            [['id', 'username', 'passwordHash'], 'required'],
            [['id', 'member_id'], 'integer'],
            [['username', 'passwordHash'], 'string'],
            [['id'], 'unique'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'passwordHash' => 'Password Hash',
            'member_id' => 'Member ID',
        ];
    }

    public static function findIdentity($id) {
        return self::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
    }

    public static function findByUsername($username) {
        $user = self::findOne(['username' => $username]);
        if ($user) {
            return $user;
        }
        return null;
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthKey() {
    }

    public function validateAuthKey($authKey) {
    }

    public function validatePassword($password) {
        return $this->passwordHash === $password;
    }

    public function getMember() {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }
}
