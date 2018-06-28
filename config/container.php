<?php

use yii\helpers\Html;
use yii\helpers\Url;

\Yii::$container->set('yii\grid\GridView', [
    'layout' => "{items}\n{summary}\n{pager}",
]);

\Yii::$container->set('yii\grid\ActionColumn', [
    'template' => '{edit} {delete}',
    'buttons' => [
        'edit' => function ($url, $model) {
            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', [Url::to(['edit', 'id' => $model->id])]);
        },
    ],
]);