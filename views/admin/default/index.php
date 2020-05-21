<?php

use yii\helpers\Html;
use panix\engine\grid\GridView;
use panix\engine\widgets\Pjax;
?>


<?= \panix\ext\fancybox\Fancybox::widget(['target' => '.image a']); ?>

<?php
echo Html::a('merchants.google.com','https://merchants.google.com/');



$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey("");
$service = new Google_Service_Gmail($client);

\panix\engine\CMS::dump($service->users_messages);
Pjax::begin([
    'dataProvider' => $dataProvider,
]);
echo GridView::widget([
    'tableOptions' => ['class' => 'table table-striped'],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layoutOptions' => ['title' => $this->context->pageName],
    'showFooter' => true,
    //   'footerRowOptions' => ['class' => 'text-center'],
    'rowOptions' => ['class' => 'sortable-column']
]);
Pjax::end();
?>

