<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "StockUnit".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Stock[] $stocks
 */
class StockUnit extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'StockUnit';
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
            'name' => 'Einheit',
        ];
    }


    public function getStocks() {
        return $this->hasMany(Stock::className(), ['stockUnit_id' => 'id']);
    }
}
