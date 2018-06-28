<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caisse */

$this->title = ($model->isNewRecord) ? 'Buchung tätigen' : $model->bookingText . ' bearbeiten';
$this->params['breadcrumbs'][] = ['label' => 'Buchungen', 'url' => ['list']];
$this->params['breadcrumbs'][] = $model->isNewRecord ? 'Hinzufügen' : 'Bearbeiten';
?>
<div class="caisse-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
