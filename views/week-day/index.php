<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Week Days';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="week-day-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Week Day', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date',
            'count_calls',
            [
                'label' => 'Employee',
                'value' => function($model) { return $model->getEmployee()->getFullName(); }
            ],
            [
                'label' => 'PresenceView',
                'value' => function($model) { return $model->getPresenceView(); }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
