<?php

use app\models\NodeData;
use app\models\NodeSetting;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Node */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-view">

    <h1><?= Html::encode('[' . $this->title . '] ' . $model->label) ?></h1>

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
            'label',
            'type',
            'status',
            'remark',
            'project_id',
            'created_by',
            'created_at',
            'modified_at',
        ],
    ]) ?>

    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => NodeSetting::find()->where(['node_id' => $model->id]),
    ]);
    ?>

    <br>
    <h2>Node Settings</h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'node_id',
            'label',
            'value',
            'created_at',
            // 'modified_at',

            ['class' => 'yii\grid\ActionColumn',
            'controller'=>'node-setting'],
        ],
    ]); ?>


    <?php
    $dataProvider2 = new ActiveDataProvider([
        'query' => NodeData::find()->where(['node_id' => $model->id])->orderBy("id DESC"),
    ]);
    ?>

    <br>
    <h2>Node Data</h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'node_id',
            'label',
            'value',
            'node_ping_id',
            // 'created_at',
            // 'modified_at',

//            ['class' => 'yii\grid\ActionColumn',
//            'controller' => 'node-data'],
        ],
    ]); ?>


</div>
