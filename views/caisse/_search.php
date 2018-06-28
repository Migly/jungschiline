<?php

use app\models\Member;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CaisseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caisse-search well">
    <p><?php echo Html::a('Buchung hinzufügen', ['edit'], ['class' => 'btn btn-success']) ?></p>

    <?php $form = ActiveForm::begin(['action' => ['list'], 'method' => 'get']); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php echo $form->field($model, 'member_id')->dropDownList(Member::getLeaderDropdown(), ['prompt' => 'Bitte wählen...']) ?>
            <?php echo $form->field($model, 'bookingText') ?>
        </div>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'dateFrom') ?>
            <?php echo $form->field($model, 'dateTo') ?>
        </div>
    </div>

    <div class="form-group col-lg-offset-6">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
