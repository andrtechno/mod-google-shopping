<?php
namespace app\modules\googleShopping\migrations;

use yii\db\Migration;
use app\modules\googleShopping\models\GoogleShoppingFeeds;

class m170881_105104_google_shopping_feeds extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(GoogleShoppingFeeds::tableName(), [
            'id' => $this->primaryKey(),
                ], $tableOptions);



        //$this->createIndex('switch', GoogleShoppingFeeds::tableName(), 'switch', 0);



    }

    public function down() {

        $this->dropTable(GoogleShoppingFeeds::tableName());
    }

}
