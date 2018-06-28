<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaisseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buchungen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caisse-index">

    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'transactionDate:date',
            'bookingText',
            [
                'attribute' => 'member.firstname',
                'label' => 'Mitglied',
            ],
            [
                'attribute' => 'income',
                'format' => 'currency',
                'contentOptions' => [
                    'class' => 'text-right',
                ],
            ],
            [
                'attribute' => 'outgoing',
                'format' => 'currency',
                'contentOptions' => [
                    'class' => 'text-right',
                ],

            ],
            [
                'attribute' => 'balance',
                'label' => 'Saldo',
                'format' => 'currency',
                'contentOptions' => [
                    'class' => 'text-right',
                ],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
