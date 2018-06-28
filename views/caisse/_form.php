<?php

use app\models\Member;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Caisse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caisse-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php echo $form->field($model, 'transactionDate')->textInput(['value' => date('d.m.Y')]) ?>
            <?php echo $form->field($model, 'bookingText')->textInput() ?>
            <?php echo $form->field($model, 'member_id')->dropDownList(Member::getLeaderDropdown(), ['prompt' => 'Bitte wählen...']) ?>
        </div>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'income')->textInput() ?>
            <?php echo $form->field($model, 'outgoing')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Buchen' : 'Speichern', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
