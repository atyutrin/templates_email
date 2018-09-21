<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * Модель Template для бэкэнда
 */
class Template extends \common\models\Template
{
    public $description;
    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return ArrayHelper::merge(
            parent::rules(),
            [['description', 'required']]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        $attributeLabels = parent::attributeLabels();
        $attributeLabels['description'] = Yii::t('app', 'Шаблон');
        return $attributeLabels;
    }
}