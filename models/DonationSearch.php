<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Donation;

/**
 * DonationSearch represents the model behind the search form about `app\models\Donation`.
 */
class DonationSearch extends Donation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DonationID', 'PersonID', 'NumItems', 'AddedBy'], 'integer'],
            [['TaxDocLoc', 'AddedOn'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Donation::find();

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
            'DonationID' => $this->DonationID,
            'PersonID' => $this->PersonID,
            'NumItems' => $this->NumItems,
            'AddedOn' => $this->AddedOn,
            'AddedBy' => $this->AddedBy,
        ]);

        $query->andFilterWhere(['like', 'TaxDocLoc', $this->TaxDocLoc]);

        return $dataProvider;
    }
}
