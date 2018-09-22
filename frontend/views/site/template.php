<?php
use \yii\helpers\HtmlPurifier;

/** @var $model \frontend\models\Template */
$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $model->title ?></h1>
<?= HtmlPurifier::process($model->body) ?>