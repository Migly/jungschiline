<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class EventSearch extends Event {
    public function rules() {
        return [
            [['id', 'type', 'responsibleMember_id', 'activityMember_id', 'inputMember_id', 'level_id'], 'integer'],
            [['name', 'beginning', 'ending', 'activity', 'input'], 'safe'],
        ];
    }

    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params) {
        $query = Event::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'beginning' => $this->beginning,
            'ending' => $this->ending,
            'type' => $this->type,
            'responsibleMember_id' => $this->responsibleMember_id,
            'activityMember_id' => $this->activityMember_id,
            'inputMember_id' => $this->inputMember_id,
            'level_id' => $this->level_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'activity', $this->activity])
            ->andFilterWhere(['like', 'input', $this->input]);

        return $dataProvider;
    }
}
