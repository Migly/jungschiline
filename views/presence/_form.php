<?php

use app\models\Event;
use app\models\Member;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Presence */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presence-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php echo $form->field($model, 'event_id')->dropDownList(Event::getEventsOfThisYearDropdown(), ['prompt' => 'Bitte wählen...']) ?>
        </div>
        <div class="col-lg-6">
            <?php
            echo $form->field($model, 'memberIds')->widget(Select2::classname(), [
                'data' => Member::getMemberDropdown(),
                'options' => ['placeholder' => 'Alle'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true,
                ],
            ]);
            ?>
            <?php echo $form->field($model, 'isPaid')->checkBox() ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?php echo Html::submitButton($model->isNewRecord ? 'Hinzufügen' : 'Bearbeiten', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
