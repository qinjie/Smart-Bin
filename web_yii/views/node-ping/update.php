<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NodePing */

$this->title = 'Update Node Ping: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Node Pings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="node-ping-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
