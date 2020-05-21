<?php

namespace app\modules\googleShopping\models\forms;

use panix\engine\SettingsModel;

class SettingsForm extends SettingsModel
{

    protected $module = 'googleShopping';
    public static $category = 'googleShopping';

    public $merchant_id;

    public function rules()
    {
        return [
            [['merchant_id'], "required"],
            // [['product_related_bilateral','price_penny'],'boolean']
        ];
    }

}