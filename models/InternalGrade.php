<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "InternalGrade".
 *
 * @property integer $id
 * @property string $shortform
 * @property string $name
 * @property integer $layer
 *
 * @property Member[] $members
 */
class InternalGrade extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'InternalGrade';
    }

    public function rules() {
        return [
            [['shortform', 'name', 'layer'], 'required'],
            [['shortform', 'name'], 'string'],
            [['layer'], 'integer'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'shortform' => 'Initialen',
            'name' => 'Name',
            'layer' => 'Layer',
        ];
    }

    public static function getInternalGradeDropdown() {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function getMembers() {
        return $this->hasMany(Member::className(), ['internalGrade_id' => 'id']);
    }
}
