<?php

use app\models\Event;
use app\models\Member;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PresenceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presence-search well">
    <p><?php echo Html::a('Create Presence', ['edit'], ['class' => 'btn btn-success']) ?></p>

    <?php $form = ActiveForm::begin(['action' => ['list'], 'method' => 'get',]); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php echo $form->field($model, 'event_id')->dropDownList(Event::getEventsOfThisYearDropdown()) ?>
        </div>
        <div class="col-lg-6">
            <?php
            echo $form->field($model, 'memberIds')->widget(Select2::classname(), [
                'data' => Member::getMemberDropdown(),
                'options' => ['placeholder' => 'Alle'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
            <?php echo $form->field($model, 'isPaid')->checkbox() ?>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-lg-offset-6">
            <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
