 <?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->isNewRecord ? 'Event hinzufügen' : 'Event ' . $model->name . ' bearbeiten';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['list']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
