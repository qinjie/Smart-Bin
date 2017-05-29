<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NodePing */

$this->title = 'Create Node Ping';
$this->params['breadcrumbs'][] = ['label' => 'Node Pings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-ping-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
