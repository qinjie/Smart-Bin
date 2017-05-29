<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NodeData */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Node Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-data-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'node_id',
            'label',
            'value',
            'node_ping_id',
            'created_at',
            'modified_at',
        ],
    ]) ?>

</div>
