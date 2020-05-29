<?php

namespace panix\mod\google\shopping;

use Yii;
use panix\engine\WebModule;

class Module extends WebModule
{

    public $icon = 'google';
    public $marchentId = 235811972;
    public $accountId = '';

    public function getAdminMenu()
    {
        return [
            'modules' => [
                'items' => [
                    [
                        'label' => Yii::t('googleshopping/default', 'MODULE_NAME'),
                        "url" => ['/admin/googleshopping'],
                        'icon' => $this->icon
                    ],
                ],
            ],
        ];
    }


    public function getInfo()
    {
        return [
            'label' => Yii::t('googleshopping/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => $this->icon,
            'description' => Yii::t('googleshopping/default', 'MODULE_DESC'),
            'url' => ['/admin/googleshopping'],
        ];
    }

}
