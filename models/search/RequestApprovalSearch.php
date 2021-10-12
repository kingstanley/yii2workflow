<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RequestApproval;

/**
 * RequestApprovalSearch represents the model behind the search form of `app\models\RequestApproval`.
 */
class RequestApprovalSearch extends RequestApproval
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'requestId', 'approvalLevelId', 'approvalPersonId', 'createdAt', 'updatedAt'], 'integer'],
            [['approvalStatus'], 'safe'],
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
        $query = RequestApproval::find();

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
            'requestId' => $this->requestId,
            'approvalLevelId' => $this->approvalLevelId,
            'approvalPersonId' => $this->approvalPersonId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'approvalStatus', $this->approvalStatus]);

        return $dataProvider;
    }
}
