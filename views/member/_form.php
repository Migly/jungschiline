<?php

use app\models\BesjGrade;
use app\models\InternalGrade;
use app\models\Level;
use app\models\Member;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <h4 class="title">Adresse</h4>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'firstname')->textInput() ?>
            <?php echo $form->field($model, 'lastname')->textInput() ?>
            <?php echo $form->field($model, 'nickname')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <div class="col-lg-9">
                <?php echo $form->field($model, 'street')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?php echo $form->field($model, 'houseNr')->textInput() ?>
            </div>
            <div class="col-lg-3">
                <?php echo $form->field($model, 'postalCode')->textInput() ?>
            </div>
            <div class="col-lg-9">
                <?php echo $form->field($model, 'city')->textInput() ?>
            </div>
            <?php echo $form->field($model, 'birthdate')->textInput() ?>
        </div>
    </div>
    <h4 class="title">Kontakt</h4>
    <div class="row">
        <div class="col-lg-6">
            <?php echo $form->field($model, 'mother')->textInput() ?>
            <?php echo $form->field($model, 'father')->textInput() ?>
            <?php echo $form->field($model, 'email')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'mobilePhone')->textInput() ?>
            <?php echo $form->field($model, 'homePhone')->textInput() ?>
        </div>
    </div>
    <h4 class="title">Intern</h4>
    <div class="row">
        <div class="col-lg-6">
            <?php echo $form->field($model, 'level_id')->dropDownList(Level::getLevelDropdown()) ?>
            <?php echo $form->field($model, 'internalGrade_id')->dropDownList(InternalGrade::getInternalGradeDropdown()) ?>
            <?php echo $form->field($model, 'buddy')->dropDownList(Member::getLeaderDropdown(), ['prompt' => 'Bitte wählen...']) ?>
        </div>
        <div class="col-lg-6">
            <?php echo $form->field($model, 'besjGrade_id')->dropDownList(BesjGrade::getBesjGradeDropdown()) ?>
            <?php echo $form->field($model, 'startedAt')->textInput() ?>
            <?php echo $form->field($model, 'isLeader')->checkbox() ?>
            <?php echo $form->field($model, 'isActive')->checkbox() ?>
        </div>
    </div>
</div>
<div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
