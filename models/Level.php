<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Level".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Event[] $events
 */
class Level extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'Level';
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
            'name' => 'Stufe',
        ];
    }

    public static function getLevelDropdown() {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function getEvents() {
        return $this->hasMany(Event::className(), ['level_id' => 'id']);
    }
}
