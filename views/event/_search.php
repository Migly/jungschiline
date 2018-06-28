<?php

use app\models\Level;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-search well">
    <p><?php echo Html::a('Event hinzufügen', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?php $form = ActiveForm::begin(['action' => ['list'], 'method' => 'get',]); ?>

    <div class="row">
        <div class="col-lg-6">
            <?php echo $form->field($model, 'name') ?>
        </div>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'level_id')->dropDownList(Level::getLevelDropdown(), ['prompt' => 'Bitte wählen...']) ?>
        </div>
    </div>

    <div class="form-group col-lg-offset-6">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
