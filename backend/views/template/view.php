<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model backend\models\Template */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Шаблоны'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->getFlash('error-file-upload')): ?>
        <div class="alert alert-danger" role="alert">
            <?= Yii::$app->session->getFlash('error-file-upload'); ?>
        </div>
    <?php endif; ?>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены что хотите удалить?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'file_name',
            'updated_at',
            'created_at',
            [
                'attribute' => 'body',
                'value' => HtmlPurifier::process($model->body),
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
