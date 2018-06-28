<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = $model->isNewRecord ? 'Mitglied hinzufügen' : 'Mitglied bearbeiten: ' . $model->firstname . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Mitglieder', 'url' => ['list']];
$this->params['breadcrumbs'][] = $model->isNewRecord ? 'Hinzufügen' : 'Bearbeiten';
?>
<div class="member-edit">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
