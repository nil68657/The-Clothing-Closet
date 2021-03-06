<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Person;

/* @var $this yii\web\View */
/* @var $model app\models\Donation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PersonID')->dropdownList(ArrayHelper::map(Person::find()->all(), 'PersonID', function($person) { return $person->fullName;}), ['prompt' => "Select Person", 'class' => 'select2']); ?>

    <?= $form->field($model, 'NumItems')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
