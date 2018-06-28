<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


class CaisseSearch extends Caisse {
    public $dateFrom;
    public $dateTo;

    public function rules() {
        return [
            [['id', 'member_id', 'isActive'], 'integer'],
            [['bookingText'], 'string'],
            [['income', 'outgoing'], 'number'],
            [['transactionDate', 'dateFrom', 'dateTo'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), ['dateFrom' => 'Von', 'dateTo' => 'Bis']);
    }

    public function scenarios() {
        return Model::scenarios();
    }

    public function search($params) {
        $this->load($params);

        $subQuery = Caisse::find();
        $subQuery->select(['sum(income) - sum(outgoing)']);
        $subQuery->where(new \yii\db\Expression('id <= c.id'));
        $this->filterResult($subQuery);

        $query = Caisse::find();
        $query->alias('c');
        $query->select('*');
        $query->addSelect('(' . $subQuery->createCommand()->rawSql . ') AS balance');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        if (!$this->validate()) {
            return $dataProvider;
        }
        $this->filterResult($query);

        return $dataProvider;
    }

    private function filterResult($query) {
        $query->andFilterWhere(['BETWEEN', 'transactionDate', $this->dateFrom, $this->dateTo]);
        $query->andFilterWhere([
            'member_id' => $this->member_id,
        ]);
        $query->andFilterWhere(['LIKE', 'bookingText', $this->bookingText]);
    }
}
