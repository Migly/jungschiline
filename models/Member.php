<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Member".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $nickname
 * @property string $birthdate
 * @property integer $level_id
 * @property integer $internalGrade_id
 * @property integer $besjGrade_id
 * @property string $startedAt
 * @property string $street
 * @property string $houseNr
 * @property integer $postalCode
 * @property string $city
 * @property string $email
 * @property string $mother
 * @property string $father
 * @property integer $buddy
 * @property string $mobilePhone
 * @property string $homePhone
 * @property integer $isLeader
 * @property integer $isActive
 *
 * @property Event[] $events
 * @property Event[] $events0
 * @property InternalGrade $internalGrade
 * @property BesjGrade $besjGrade
 * @property MemberDepartment[] $memberDepartments
 * @property Department[] $departments
 * @property Presence[] $presences
 * @property Event[] $events1
 */
class Member extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'Member';
    }

    public function rules() {
        return [
            [['firstname', 'lastname', 'isLeader'], 'required'],
            [['firstname', 'lastname', 'nickname', 'street', 'houseNr', 'city', 'email', 'mother', 'father', 'mobilePhone', 'homePhone'], 'string'],
            [['birthdate', 'startedAt'], 'safe'],
            [['level_id', 'internalGrade_id', 'besjGrade_id', 'postalCode', 'buddy', 'isLeader', 'isActive'], 'integer'],
            [['internalGrade_id'], 'exist', 'skipOnError' => true, 'targetClass' => InternalGrade::className(), 'targetAttribute' => ['internalGrade_id' => 'id']],
            [['besjGrade_id'], 'exist', 'skipOnError' => true, 'targetClass' => BesjGrade::className(), 'targetAttribute' => ['besjGrade_id' => 'id']],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'firstname' => 'Vorname',
            'lastname' => 'Nachname',
            'nickname' => 'JS-Name',
            'birthdate' => 'Geburtsdatum',
            'level_id' => 'Stufe',
            'internalGrade_id' => 'Position',
            'besjGrade_id' => 'Besjkurs',
            'startedAt' => 'Eintritt',
            'street' => 'Strasse',
            'houseNr' => 'HausNr',
            'postalCode' => 'PLZ',
            'city' => 'Ort',
            'email' => 'Email',
            'mother' => 'Mutter',
            'father' => 'Vater',
            'buddy' => 'Pate',
            'mobilePhone' => 'Mobil',
            'homePhone' => 'Festnetz',
            'isLeader' => 'Leiter',
            'isActive' => 'Aktiv',
        ];
    }

    public static function getMemberDropdown() {
        $result = self::findAll(['isActive' => true]);

        $members = [];
        foreach ($result as $row) {
            $members[$row->id] = $row->firstname . ' ' . $row->lastname;
        }

        return $members;
    }

    public static function getLeaderDropdown() {
        return ArrayHelper::map(self::findAll(['isActive' => true, 'isLeader' => true]), 'id', 'firstname');
    }

    public function getEvents() {
        return $this->hasMany(Event::className(), ['activityResponsible' => 'id']);
    }

    public function getEvents0() {
        return $this->hasMany(Event::className(), ['inputResponsible' => 'id']);
    }

    public function getInternalGrade() {
        return $this->hasOne(InternalGrade::className(), ['id' => 'internalGrade_id']);
    }

    public function getBesjGrade() {
        return $this->hasOne(BesjGrade::className(), ['id' => 'besjGrade_id']);
    }

    public function getMemberDepartments() {
        return $this->hasMany(MemberDepartment::className(), ['member_id' => 'id']);
    }

    public function getDepartments() {
        return $this->hasMany(Department::className(), ['id' => 'department_id'])->viaTable('MemberDepartment', ['member_id' => 'id']);
    }

    public function getPresences() {
        return $this->hasMany(Presence::className(), ['member_id' => 'id']);
    }

    public function getLevel() {
        return $this->hasOne(Level::className(), ['id' => 'level_id']);
    }

    public function getEvents1() {
        return $this->hasMany(Event::className(), ['id' => 'event_id'])->viaTable('Presence', ['member_id' => 'id']);
    }
}
