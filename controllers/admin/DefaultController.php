<?php

namespace app\modules\googleShopping\controllers\admin;

use Yii;
use yii\helpers\Html;
use app\modules\googleShopping\models\GoogleShoppingFeeds;
use app\modules\googleShopping\models\search\GoogleShoppingFeedsSearch;
use panix\engine\controllers\AdminController;


class DefaultController extends AdminController
{

    public $tab_errors = [];

    public function actions()
    {
        return [
            'sortable' => [
                'class' => \panix\engine\grid\sortable\Action::class,
                'modelClass' => GoogleShoppingFeeds::class,
            ],
            'delete' => [
                'class' => 'panix\engine\grid\actions\DeleteAction',
                'modelClass' => GoogleShoppingFeeds::class,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->pageName = Yii::t('shop/admin', 'PRODUCTS');
        $this->buttons = [
            [
                'icon' => 'add',
                'label' => Yii::t('shop/admin', 'CREATE_PRODUCT'),
                'url' => ['create'],
                'options' => ['class' => 'btn btn-success']
            ]
        ];
        $this->breadcrumbs = [
            $this->pageName
        ];

        $searchModel = new GoogleShoppingFeedsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionUpdate($id = false)
    {

        $model = GoogleShoppingFeeds::findModel($id, Yii::t('shop/admin', 'NO_FOUND_ATTR'));

        $this->pageName = Yii::t('googleShopping/default', 'MODULE_NAME');


        if (!$model->isNewRecord) {
            $this->buttons[] = [
                'icon' => 'eye',
                'label' => Yii::t('googleShopping/admin', 'VIEW_PRODUCT'),
                'url' => $model->getUrl(),
                'options' => ['class' => 'btn btn-info', 'target' => '_blank']
            ];
        }

        $this->buttons[] = [
            'icon' => 'add',
            'label' => Yii::t('shop/admin', 'CREATE_PRODUCT'),
            'url' => ['create'],
            'options' => ['class' => 'btn btn-success']
        ];

        $this->breadcrumbs[] = [
            'label' => $this->pageName,
            'url' => ['index']
        ];
        $this->breadcrumbs[] = [
            'label' => Yii::t('shop/admin', 'PRODUCTS'),
            'url' => ['index']
        ];
        $this->breadcrumbs[] = Yii::t('app', 'UPDATE');
        $post = Yii::$app->request->post();


        $title = ($model->isNewRecord) ? Yii::t('shop/admin', 'CREATE_PRODUCT') :
            Yii::t('shop/admin', 'UPDATE_PRODUCT');
        $this->pageName = $title;


        if ($model->load($post) && $model->validate()) {


            $model->save();


            Yii::$app->session->addFlash('success', \Yii::t('app', 'SUCCESS_CREATE'));
            if ($model->isNewRecord) {
                return Yii::$app->getResponse()->redirect(['/admin/portfolio']);
            } else {
                return Yii::$app->getResponse()->redirect(['/admin/portfolio/default/update', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        $model = new GoogleShoppingFeeds;
        if (($model = $model::findOne($id)) !== null) {
            return $model;
        } else {
            $this->error404();
        }
    }

}
