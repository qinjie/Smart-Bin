<?php

use app\models\Node;
use app\models\ProjectSetting;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\project */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <br>
    <h1><?= Html::encode('[' . $this->title . '] ' . $model->label) ?></h1>

    <p align="right">
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
            'remark',
            'serial',
            'status',
            'user_id',
            'created_at',
            'modified_at',
        ],
    ]) ?>

    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => ProjectSetting::find()->where(['project_id' => $model->id]),
    ]);
    ?>

    <br>
    <h2>Project Settings</h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'project_id',
            'label',
            'value',
            'created_at',
            // 'modified_at',
            ['class' => 'yii\grid\ActionColumn',
                'controller' => 'project-setting'],
        ],
    ]); ?>

    <?php
    $dataProvider2 = new ActiveDataProvider([
        'query' => Node::find()->where(['project_id' => $model->id]),
    ]);
    ?>

    <br>
    <h2>Nodes</h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],
            'id',
            'label',
            'type',
            'status',
            'remark',
            // 'project_id',
            // 'created_by',
            // 'created_at',
            // 'modified_at',

            ['class' => 'yii\grid\ActionColumn',
                'controller' => 'node'],
        ],
    ]); ?>

</div>
