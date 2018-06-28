<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class PresenceSearch extends Presence {

    public $members;

    public function rules() {
        return [
            [['id', 'event_id', 'member_id', 'isPaid'], 'integer'],
            [['members'], 'safe'],
        ];
    }

    public function scenarios() {
        return Model::scenarios();
    }

    public function search($params) {
        $query = Presence::find();
        $query->select('event_id');
//        $query->distinct();
        $query->orderBy('event_id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'event_id' => $this->event_id,
            'member_id' => $this->member_id,
            'isPaid' => $this->isPaid,
        ]);

        return $dataProvider;
    }
}
