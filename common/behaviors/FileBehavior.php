<?php

namespace common\behaviors;

use common\models\Template;
use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Поведение для работы с файлом шаблона
 */
class FileBehavior extends Behavior
{
    /**
     * @var Template
     */
    public $owner;

    /**
     * @inheritdoc
     */
    public function events(): array
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'loadTemplate',
        ];
    }

    /**
     * Загружает шаблон из файла в переменную
     */
    public function loadTemplate(): void
    {
        try {
            $this->owner->body = file_get_contents(Yii::getAlias('@files/') . $this->owner->file_name . Template::FILE_EXTENSION);
        } catch (\Exception $exception) {
            Yii::error([
                'message' => Yii::t('app', 'Не удалось прочитать файл: '.$this->owner->file_name),
                'error' => $exception->getMessage(),
                'trace' => $exception->getTrace(),
            ]);
        }
        $this->owner->body = $this->owner->body ?: null;
    }

}