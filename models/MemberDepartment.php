<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MemberDepartment".
 *
 * @property integer $id
 * @property integer $member_id
 * @property integer $department_id
 *
 * @property Member $member
 * @property Department $department
 */
class MemberDepartment extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'MemberDepartment';
    }

    public function rules() {
        return [
            [['member_id', 'department_id'], 'required'],
            [['member_id', 'department_id'], 'integer'],
            [['department_id', 'member_id'], 'unique', 'targetAttribute' => ['department_id', 'member_id'], 'message' => 'The combination of Member ID and Department ID has already been taken.'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'department_id' => 'Department ID',
        ];
    }

    public function getMember() {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }

    public function getDepartment() {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}
