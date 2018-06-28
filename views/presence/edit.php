<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Presence */

$this->title = $model->isNewRecord ? 'Anwesenheit hinzufügen' : 'Anwesenheit bearbeiten';
$this->params['breadcrumbs'][] = ['label' => 'Anwesenheitsliste', 'url' => ['list']];
$this->params['breadcrumbs'][] = $model->isNewRecord ? 'Hinzufügen' : 'Bearbeiten';
?>
<div class="presence-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
