<?php

namespace panix\mod\google\shopping\controllers\admin;

use Yii;
use panix\engine\controllers\AdminController;
use panix\mod\google\shopping\models\forms\SettingsForm;

class SettingsController extends AdminController
{

    public function actionIndex()
    {
        $this->pageName = Yii::t('app/default', 'SETTINGS');
        $this->breadcrumbs = [
            [
                'label' => $this->module->info['label'],
                'url' => $this->module->info['url'],
            ],
            $this->pageName
        ];
        $model = new SettingsForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return Yii::$app->getResponse()->redirect(['/admin/googleShopping/settings']);
        }
        return $this->render('index', [
            'model' => $model
        ]);
    }

}
