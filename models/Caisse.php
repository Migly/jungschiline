<?php

namespace app\models;

/**
 * This is the model class for table "Caisse".
 *
 * @property integer $id
 * @property string $bookingText
 * @property string $income
 * @property string $outgoing
 * @property string $transactionDate
 * @property integer $member_id
 * @property integer $isActive
 *
 * @property Member $member
 */
class Caisse extends \yii\db\ActiveRecord {
    public $balance;


    public static function tableName() {
        return 'Caisse';
    }

    public function rules() {
        return [
            [['bookingText'], 'string'],
            [['income', 'outgoing'], 'number'],
            [['transactionDate'], 'required'],
            [['transactionDate', 'balance'], 'safe'],
            [['member_id', 'isActive'], 'integer'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'bookingText' => 'Buchungstext',
            'income' => 'Eingang',
            'outgoing' => 'Ausgang',
            'transactionDate' => 'Datum',
            'member_id' => 'Member ID',
            'isActive' => 'Aktiv',
        ];
    }

    public function getMember() {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }
}
