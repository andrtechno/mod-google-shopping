<?php

namespace app\modules\googleShopping\models\search;

use app\modules\googleShopping\models\GoogleShoppingFeeds;
use Yii;
use yii\base\Model;
use panix\engine\data\ActiveDataProvider;


/**
 * PagesSearch represents the model behind the search form about `app\modules\pages\models\Pages`.
 */
class GoogleShoppingFeedsSearch extends GoogleShoppingFeeds {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['name', 'slug'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = static::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);





        return $dataProvider;
    }

}
