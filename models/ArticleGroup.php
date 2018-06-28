<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ArticleGroup".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Stock[] $stocks
 */
class ArticleGroup extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'ArticleGroup';
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
            'name' => 'Artikelgruppe',
        ];
    }

    public function getStocks() {
        return $this->hasMany(Stock::className(), ['articleGroup_id' => 'id']);
    }
}
