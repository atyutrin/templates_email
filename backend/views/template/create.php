<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Template */

$this->title = Yii::t('app', 'Создать шаблон');
$this->params['breadcrumbs'][] = ['label' => 'Шаблоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
