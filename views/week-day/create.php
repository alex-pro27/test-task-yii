<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WeekDay */

$this->title = 'Create Week Day';
$this->params['breadcrumbs'][] = ['label' => 'Week Days', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="week-day-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
