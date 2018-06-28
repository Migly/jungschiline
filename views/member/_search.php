<?php


use app\models\Level;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\BesjGrade;
use app\models\InternalGrade;

/* @var $this yii\web\View */
/* @var $model app\models\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-search well">
    <p><?php echo Html::a('Mitglied hinzufügen', ['edit'], ['class' => 'btn btn-success']) ?></p>

    <?php $form = ActiveForm::begin(['action' => ['list'], 'method' => 'get']); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php echo $form->field($model, 'nickname') ?>
            <?php echo $form->field($model, 'firstname') ?>
            <?php echo $form->field($model, 'lastname') ?>
        </div>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'level_id')->dropDownList(Level::getLevelDropdown(), ['prompt' => 'Bitte wählen...']) ?>
            <?php echo $form->field($model, 'internalGrade_id')->dropDownList(InternalGrade::getInternalgradeDropdown(), ['prompt' => 'Bitte wählen...']) ?>
            <?php echo $form->field($model, 'besjGrade_id')->dropdownList(BesjGrade::getBesjGradeDropdown(), ['prompt' => 'Bitte wählen...']) ?>
        </div>
        <div class="form-group col-lg-offset-6">
            <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
