<?php

use yii\helpers\Url;

/* @var $models \common\models\Template[] */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($models as $template): ?>
                <div class="col-md-3 col-sm-6">
                    <a href="<?= Url::to(['/site/template', 'id' => $template->id]) ?>" class="card">
                        <?= $template->title ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
