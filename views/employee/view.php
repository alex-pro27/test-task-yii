<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $month string */
/* @var $weekDays */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php $form = ActiveForm::begin() ?>

        <label for="month">Select Month:</label>
        <?= DatePicker::widget([
            'language' => 'ru',
            'dateFormat' => 'php:Y-m',
            'value' => $month,
            'name' => 'month',
            'options' => [
                'class' => 'form-control',
                'name' => 'month',
                'id' => 'month',
                'required' => true,
            ],
            'clientOptions' => [
                'dateFormat' => 'yy-mm',
                'changeMonth'=> true,
                'changeYear'=> true,
            ],
        ]);?>

        <div class="form-group">
            <?= Html::submitButton('Show information for the month', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end() ?>



    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'surname',
            'salary',
            [
                'label' => 'WeekDays',
                'format' => 'raw',
                'value' => join(
                        '<br>',
                        array_map(
                            function($weekDay){
                                return Html::a(
                                        $weekDay->date . ' | ' . $weekDay->count_calls . ' | ' . $weekDay->getPresenceView(),
                                        ['week-day/view', 'id' => $weekDay->id],
                                        ['target' => 'blank']
                                );
                            },
                            $weekDays
                    )
                )
            ],

            [
                'label' => 'Salary + Bonus',
                'value' => $model->fullSalary
            ],

            [
                'label' => 'Bonus',
                'value' =>  $model->bonus? $model->bonus['desk'] . ' | ' . $model->bonus['bonus'] . ' / call': 0
            ],

            [
                'label' => 'Sum calls',
                'value' => $model->sumCalls
            ],

        ],
    ]) ?>

</div>
