<?php

namespace app\models;


/**
 * This is the model class for table "Presence".
 *
 * @property integer $id
 * @property integer $event_id
 * @property integer $member_id
 * @property integer $isPaid
 *
 * @property Event $event
 * @property Member $member
 */
class Presence extends \yii\db\ActiveRecord {

    public $memberIds;

    public static function tableName() {
        return 'Presence';
    }

    public static function primaryKey() {
        return ['event_id'];
    }

    public function rules() {
        return [
            [['event_id', 'member_id', 'memberIds'], 'required'],
            [['event_id', 'member_id', 'isPaid'], 'integer'],
            [['event_id', 'member_id'], 'unique', 'targetAttribute' => ['event_id', 'member_id'], 'message' => 'The combination of Event ID and Member ID has already been taken.'],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'event_id' => 'Event',
            'member_id' => 'Mitglied',
            'isPaid' => 'Bezahlt',
        ];
    }

    public function getEvent() {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    public function getMember() {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }
}
