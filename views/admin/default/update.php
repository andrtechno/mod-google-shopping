<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;

?>


<div class="card">
    <div class="card-header">
        <h5><?= Html::encode($this->context->pageName) ?></h5>
    </div>
    <div class="card-body">


        <?php


        $form = ActiveForm::begin([
            'id' => strtolower(basename(get_class($model))) . '-form',
            'options' => [
                'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data'
            ]
        ]);

        echo \panix\engine\bootstrap\Tabs::widget([
            //'encodeLabels'=>true,
            'items' => [
                [
                    'label' => $model::t('TAB_MAIN'),
                    'content' => $this->render('tabs/_main', ['form' => $form, 'model' => $model]),
                    'active' => true,
                    'options' => ['id' => 'main'],
                ],
            ],
        ]);
        ?>
        <div class="card-footer text-center">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'CREATE') : Yii::t('app', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>


        <?php
        ActiveForm::end();


        ?>
    </div>
</div>

