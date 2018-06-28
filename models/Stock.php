<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Stock".
 *
 * @property integer $id
 * @property string $name
 * @property integer $articleGroup_id
 * @property integer $stockLocation_id
 * @property integer $container_id
 * @property integer $stockUnit_id
 * @property integer $amount
 *
 * @property ArticleGroup $articleGroup
 * @property StockLocation $stockLocation
 * @property Container $container
 * @property StockUnit $stockUnit
 */
class Stock extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'Stock';
    }


    public function rules()
    {
        return [
            [['name'], 'string'],
            [['articleGroup_id', 'stockLocation_id', 'container_id', 'stockUnit_id', 'amount'], 'integer'],
            [['articleGroup_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleGroup::className(), 'targetAttribute' => ['articleGroup_id' => 'id']],
            [['stockLocation_id'], 'exist', 'skipOnError' => true, 'targetClass' => StockLocation::className(), 'targetAttribute' => ['stockLocation_id' => 'id']],
            [['container_id'], 'exist', 'skipOnError' => true, 'targetClass' => Container::className(), 'targetAttribute' => ['container_id' => 'id']],
            [['stockUnit_id'], 'exist', 'skipOnError' => true, 'targetClass' => StockUnit::className(), 'targetAttribute' => ['stockUnit_id' => 'id']],
        ];
    }



    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '',
            'articleGroup_id' => 'Article Group ID',
            'stockLocation_id' => 'Stock Location ID',
            'container_id' => 'Container ID',
            'stockUnit_id' => 'Stock Unit ID',
            'amount' => 'Menge',
        ];
    }


    public function getArticleGroup()
    {
        return $this->hasOne(ArticleGroup::className(), ['id' => 'articleGroup_id']);
    }


    public function getStockLocation()
    {
        return $this->hasOne(StockLocation::className(), ['id' => 'stockLocation_id']);
    }


    public function getContainer()
    {
        return $this->hasOne(Container::className(), ['id' => 'container_id']);
    }


    public function getStockUnit()
    {
        return $this->hasOne(StockUnit::className(), ['id' => 'stockUnit_id']);
    }
}
