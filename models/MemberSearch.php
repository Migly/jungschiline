<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class MemberSearch extends Member {
    public function rules() {
        return [
            [['id', 'level_id', 'internalGrade_id', 'besjGrade_id', 'postalCode', 'buddy', 'isLeader', 'isActive'], 'integer'],
            [['firstname', 'lastname', 'nickname', 'birthdate', 'startedAt', 'street', 'houseNr', 'city', 'email', 'mother', 'father', 'mobilePhone', 'homePhone'], 'safe'],
        ];
    }

    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params) {
        $query = Member::find();
$query->where(['isActive' => true]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birthdate' => $this->birthdate,
            'level_id' => $this->level_id,
            'internalGrade_id' => $this->internalGrade_id,
            'besjGrade_id' => $this->besjGrade_id,
            'startedAt' => $this->startedAt,
            'postalCode' => $this->postalCode,
            'buddy' => $this->buddy,
            'isLeader' => $this->isLeader,
            'isActive' => $this->isActive,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'houseNr', $this->houseNr])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mother', $this->mother])
            ->andFilterWhere(['like', 'father', $this->father])
            ->andFilterWhere(['like', 'mobilePhone', $this->mobilePhone])
            ->andFilterWhere(['like', 'homePhone', $this->homePhone]);

        return $dataProvider;
    }
}
