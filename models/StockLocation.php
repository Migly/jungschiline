<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "StockLocation".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Stock[] $stocks
 */
class StockLocation extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'StockLocation';
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
            'name' => 'Ort',
        ];
    }


    public function getStocks() {
        return $this->hasMany(Stock::className(), ['stockLocation_id' => 'id']);
    }
}
