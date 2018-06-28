<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'beginning:datetime',
            'ending:datetime',
            'type',
            [
                'label' => 'Leiter',
                'attribute' => 'responsibleMember.firstname',
            ],
            'activity',
            [
                'label' => 'Leiter',
                'attribute' => 'activityMember.firstname',
            ],
            'input',
            [
                'label' => 'Leiter',
                'attribute' => 'inputMember.firstname',
            ],
            'level.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
