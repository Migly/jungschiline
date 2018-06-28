<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Event".
 *
 * @property integer $id
 * @property string $name
 * @property string $beginning
 * @property string $ending
 * @property integer $type
 * @property integer $responsibleMember_id
 * @property string $activity
 * @property integer $activityMember_id
 * @property string $input
 * @property integer $inputMember_id
 * @property integer $level_id
 *
 * @property Member $activityMember
 * @property Member $inputMember
 * @property Level $level
 * @property Presence[] $presences
 * @property Member[] $members
 */
class Event extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'Event';
    }

    public function rules() {
        return [
            [['name', 'beginning', 'ending', 'type', 'level_id'], 'required'],
            [['name', 'activity', 'input'], 'string'],
            [['beginning', 'ending'], 'safe'],
            [['type', 'responsibleMember_id', 'activityMember_id', 'inputMember_id', 'level_id'], 'integer'],
            [['activityMember_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['activityMember_id' => 'id']],
            [['inputMember_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['inputMember_id' => 'id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['level_id' => 'id']],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Event',
            'beginning' => 'Start',
            'ending' => 'Ende',
            'type' => 'Typ',
            'responsibleMember_id' => 'Leiter',
            'activity' => 'Aktivität',
            'activityMember_id' => 'Leiter Aktivität',
            'input' => 'Andacht',
            'inputMember_id' => 'Leiter Andacht',
            'level_id' => 'Stufe',
        ];
    }

    public static function getEventsOfThisYearDropdown() {
        return ArrayHelper::map(self::find()->where(['>=', 'beginning', '01.01.' . date('Y')])->all(), 'id', 'name');
    }

    public function getResponsibleMember() {
        return $this->hasOne(Member::className(), ['id' => 'responsibleMember_id']);
    }

    public function getActivityMember() {
        return $this->hasOne(Member::className(), ['id' => 'activityMember_id']);
    }


    public function getInputMember() {
        return $this->hasOne(Member::className(), ['id' => 'inputMember_id']);
    }


    public function getLevel() {
        return $this->hasOne(Level::className(), ['id' => 'level_id']);
    }

    public function getPresences() {
        return $this->hasMany(Presence::className(), ['event_id' => 'id']);
    }

    public function getMembers() {
        return $this->hasMany(Member::className(), ['id' => 'member_id'])->viaTable('Presence', ['event_id' => 'id']);
    }
}
