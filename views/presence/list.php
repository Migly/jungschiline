<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anwesenheitsliste';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presence-index">

    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'event.name',
            'member.firstname',
            [
                'attribute' => 'isPaid',
                'value' => function ($model) {
                    if ($model->isPaid === 1) {
                        return 'Ja';
                    } else if ($model->isPaid === 0) {
                        return 'Nein';
                    } else {
                        return '-';
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
