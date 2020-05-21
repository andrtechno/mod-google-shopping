<?php

namespace app\modules\googleShopping;

use Yii;
use panix\engine\WebModule;

class Module extends WebModule
{


    public $marchentId = 235811972;
    public $accountId = '';

    public function getAdminMenu()
    {
        return [
            'modules' => [
                'items' => [
                    [
                        'label' => Yii::t('googleShopping/default', 'MODULE_NAME'),
                        "url" => ['/admin/googleShopping'],
                        'icon' => 'images'
                    ],
                ],
            ],
        ];
    }


    public function getInfo()
    {
        return [
            'label' => Yii::t('googleShopping/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => $this->icon,
            'description' => Yii::t('googleShopping/default', 'MODULE_DESC'),
            'url' => ['/admin/googleShopping'],
        ];
    }

}
