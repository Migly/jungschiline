<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mitglieder';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-list">

    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'firstname',
            'lastname',
            'nickname',
            'birthdate:date',
            'street',
            'houseNr',
            'postalCode',
            'city',
            'buddy',
            'level.name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
