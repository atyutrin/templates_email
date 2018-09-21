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
    public function rules(): array
    {
        return [
            [['title', 'file_name'], 'required'],
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' =>  Yii::t('app', 'Заголовок'),
            'file_name' => Yii::t('app', 'Имя файла') ,
            'updated_at' => Yii::t('app', 'Время изменения') ,
            'created_at' => Yii::t('app', 'Время создания'),
        ];
    }
}
