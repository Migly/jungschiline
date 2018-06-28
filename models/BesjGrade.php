<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "BesjGrade".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Member[] $members
 */
class BesjGrade extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'BesjGrade';
    }


    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }


    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Besj',
        ];
    }

    public static function getBesjGradeDropdown() {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function getMembers() {
        return $this->hasMany(Member::className(), ['besjGrade_id' => 'id']);
    }
}
