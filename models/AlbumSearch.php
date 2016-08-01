<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Albums;

/**
 * AlbumSearch represents the model behind the search form about `app\models\Albums`.
 */
class AlbumSearch extends Albums
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'title', 'image', 'status', 'content', 'created', 'updated', 'uid', 'sort', 'top'], 'safe'],
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
        $query = Albums::find();

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
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'created', $this->created])
            ->andFilterWhere(['like', 'updated', $this->updated])
            ->andFilterWhere(['like', 'uid', $this->uid])
            ->andFilterWhere(['like', 'sort', $this->sort])
            ->andFilterWhere(['like', 'top', $this->top]);

        return $dataProvider;
    }
}
