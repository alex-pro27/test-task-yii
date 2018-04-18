<?php

use app\models\Employee;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WeekDay */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="week-day-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'model' => $model,
        'attribute' => 'date',
        'language' => 'ru',
        'dateFormat' => 'php:Y-m-d',
        'options' => [
            'class' => 'form-control',
        ]
    ]) ?>

    <?= $form->field($model, 'presence_view')->dropDownList($model::$presenceView); ?>


    <?= $form->field($model, 'count_calls')->textInput() ?>

    <?= $form->field($model, 'employee_id')->dropDownList(ArrayHelper::map(
            Employee::find()->all(), 'id', function($employee) { return $employee->getFullName(); }
    )) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
