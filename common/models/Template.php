<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property int $id
 * @property string $title
 * @property string $file_name
 * @property string $updated_at
 * @property string $created_at
 */
class Template extends \yii\db\ActiveRecord
{
    public const FILE_EXTENSION = '.html';

    /**
     * @var string
     */
    public $body;

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'template';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' =>  Yii::t('app', 'Заголовок'),
            'file_name' => Yii::t('app', 'Имя файла') ,
            'updated_at' => Yii::t('app', 'Время изменения'),
            'created_at' => Yii::t('app', 'Время создания'),
            'body' => Yii::t('app', 'Шаблон'),
        ];
    }

}
