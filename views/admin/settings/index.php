<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;

$form = ActiveForm::begin();


?>
<div class="card">
    <div class="card-header">
        <h5><?= $this->context->pageName ?></h5>
    </div>
    <div class="panel-body">
        <?php
        echo \panix\engine\bootstrap\Tabs::widget([
            'items' => [
                [
                    'label' => 'Общие',
                    'content' => $this->render('_global', ['form' => $form, 'model' => $model]),
                    'active' => true,
                    'options' => ['id' => 'global'],
                ],

            ],
        ]);
?>
    </div>
    <div class="card-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>