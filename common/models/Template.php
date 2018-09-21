<?php

namespace common\models;

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
    public static function tableName()
    {
        return 'template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'file_name'], 'required'],
            [['updated_at', 'created_at'], 'safe'],
            [['title', 'file_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'file_name' => 'Имя файла',
            'updated_at' => 'Время изменения',
            'created_at' => 'Время создания',
        ];
    }
}
