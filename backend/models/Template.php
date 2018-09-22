<?php

namespace backend\models;

use backend\behaviors\FileBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Модель Template для бэкэнда
 */
class Template extends \common\models\Template
{
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
            FileBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'file_name', 'body'], 'required'],
            [['title', 'file_name'], 'unique'],
            [
                ['file_name'],
                'match',
                'pattern' => '/^[a-zA-Z0-9_-]+$/',
                'message' => Yii::t(
                    'app',
                    'Имя файла файла может содержать только латинские символы, цифры, символ подчёркивания и тире'
                )
            ],
            [['updated_at', 'created_at'], 'safe'],
            [['title', 'file_name'], 'string', 'max' => 255],
        ];
    }

}