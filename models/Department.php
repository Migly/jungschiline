<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Department".
 *
 * @property integer $id
 * @property string $name
 * @property integer $accordingTo
 *
 * @property Department $id0
 * @property Department $department
 * @property MemberDepartment[] $memberDepartments
 * @property Member[] $members
 */
class Department extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'Department';
    }

    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['accordingTo'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Ressort',
            'accordingTo' => 'According To',
        ];
    }


    public function getId0() {
        return $this->hasOne(Department::className(), ['id' => 'id']);
    }


    public function getDepartment() {
        return $this->hasOne(Department::className(), ['id' => 'id']);
    }


    public function getMemberDepartments() {
        return $this->hasMany(MemberDepartment::className(), ['department_id' => 'id']);
    }

    public function getMembers() {
        return $this->hasMany(Member::className(), ['id' => 'member_id'])->viaTable('MemberDepartment', ['department_id' => 'id']);
    }
}
