<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ApprovalMapping;

/**
 * ApprovalMappingSearch represents the model behind the search form of `app\models\ApprovalMapping`.
 */
class ApprovalMappingSearch extends ApprovalMapping
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userId', 'departmentId', 'approvalLevelId', 'createdAt', 'updatedAt'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ApprovalMapping::find();

        // add conditions that should always apply here

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
            'userId' => $this->userId,
            'departmentId' => $this->departmentId,
            'approvalLevelId' => $this->approvalLevelId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        return $dataProvider;
    }
}
