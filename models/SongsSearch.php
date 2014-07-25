<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Songs;

/**
 * SongsSearch represents the model behind the search form about `app\models\Songs`.
 */
class SongsSearch extends Songs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'duo', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['title', 'artist', 'lyrics', 'year', 'tags', 'status'], 'safe'],
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
        $query = Songs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'duo' => $this->duo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'artist', $this->artist])
            ->andFilterWhere(['like', 'lyrics', $this->lyrics])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
