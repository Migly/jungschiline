<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Container".
 *
 * @property integer $id
 * @property string $name
 * @property integer $volume
 *
 * @property Stock[] $stocks
 */
class Container extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'Container';
    }

    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['volume'], 'integer'],
        ];
    }


    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Behälter',
            'volume' => 'Volumen',
        ];
    }

    public function getStocks() {
        return $this->hasMany(Stock::className(), ['container_id' => 'id']);
    }
}
