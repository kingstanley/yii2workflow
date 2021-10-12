<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Request;
use \app\models\User;
use \app\models\ApprovalMapping;
use \app\models\RequestApproval;
use yii\web\ForbiddenHttpException;
use Yii;
/**
 * RequestSearch represents the model behind the search form of `app\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'requestor', 'currentApprovalLevel', 'maxApprovalLevel', 'departmentId', 'createdAt', 'updatedAt'], 'integer'],
            [['title', 'description', 'approvalStatus'], 'safe'],
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
        $query = Request::find()->andWhere(['requestor'=> Yii::$app->user->id]);

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
            'requestor' => $this->requestor,
            'currentApprovalLevel' => $this->currentApprovalLevel,
            'maxApprovalLevel' => $this->maxApprovalLevel,
            'departmentId' => $this->departmentId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'approvalStatus', $this->approvalStatus]);

        return $dataProvider;
    }

    
    public function tobeApproved($params)
    {
        // Check if user is an approval person
        $approvalMappings  = ApprovalMapping::find()->with('user')->where(['userId'=>Yii::$app->user->id])->one();
        // $user = User::findOne(['id'=>Yii::$app->user->id]);
        
        if(!$approvalMappings){
            throw new ForbiddenHttpException("You are not an approval person");
          }
        $user = $approvalMappings->user;
        
        $query = Request::find()->where(['departmentId'=> $user->departmentId, 'approvalStatus'=>['Pending','InProgress']]);

        // filter approvals that the approval person below him has approved if he is not the first approval person
        

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
            'requestor' => $this->requestor,
            'currentApprovalLevel' => $this->currentApprovalLevel,
            'maxApprovalLevel' => $this->maxApprovalLevel,
            'departmentId' => $this->departmentId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'approvalStatus', $this->approvalStatus]);

        return ['approvalMappings'=>$approvalMappings, 'dataProvider'=>$dataProvider];
    }

}
