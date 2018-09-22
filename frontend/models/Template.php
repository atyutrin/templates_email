<?php

namespace frontend\models;

use common\behaviors\FileBehavior;

/**
 * Модель шаблона писем для фронтэнда
 */
class Template extends \common\models\Template
{
    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        return [
            FileBehavior::class
        ];
    }
}