<?php

namespace app\modules\googleShopping\models;

use Yii;
use panix\engine\behaviors\TranslateBehavior;
use panix\engine\behaviors\nestedsets\NestedSetsBehavior;

use panix\engine\db\ActiveRecord;
use panix\mod\shop\models\query\CategoryQuery;
use panix\mod\shop\models\ProductCategoryRef;

class GoogleShoppingFeeds extends ActiveRecord {

    const MODULE_ID = 'shop';
    const route = '/shop/admin/category';

    public $parent_id; //NOT

    public static function tableName() {
        return '{{%google_shopping_feeds}}';
    }

    public static function find() {
        return new CategoryQuery(get_called_class());
    }

    public function getUrl() {
        return ['/shop/category/view', 'slug' => $this->full_path];
    }

    public function rules() {
        return [
            [['name', 'slug'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }



    public function beforeSave($insert) {
        $this->rebuildFullPath();
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes) {
        \Yii::$app->cache->delete('CategoryUrlRule');
        return parent::afterSave($insert, $changedAttributes);
    }

}
