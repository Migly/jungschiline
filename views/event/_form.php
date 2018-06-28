<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <h4 class="title">Eckdaten</h4>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'name')->textInput() ?>
            <?php echo $form->field($model, 'type')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'beginning')->textInput() ?>
            <?php echo $form->field($model, 'ending')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <h4 class="title">Programm</h4>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'responsibleMember_id')->textInput() ?>
            <?php echo $form->field($model, 'activity')->textInput() ?>
            <?php echo $form->field($model, 'activityMember_id')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'input')->textInput() ?>
            <?php echo $form->field($model, 'inputMember_id')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <h4 class="title">Stufe</h4>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'level_id')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Erstellen' : 'Speichern', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
