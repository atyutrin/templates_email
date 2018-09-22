<?php

namespace backend\behaviors;

use backend\models\Template;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Поведения для работы с файлом шаблона в админке
 */
class FileBehavior extends \common\behaviors\FileBehavior
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
        return ArrayHelper::merge(
            parent::events(),
            [
                ActiveRecord::EVENT_AFTER_VALIDATE => 'saveFile',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
                ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
            ]
        );
    }

    /**
     * Сохранение файла шаблона письма
     */
    public function saveFile(): void
    {
        $result = file_put_contents(
            Yii::getAlias('@files/') . $this->owner->file_name . Template::FILE_EXTENSION,
                    $this->owner->body
        );

        if (!$result) {
            $message = Yii::t('app', 'Не удалось сохранить файл');
            Yii::error([
                'message' => $message,
                'title' => $this->owner->file_name,
                'body' => $this->owner->body
            ]);
            Yii::$app->getSession()->setFlash('error-file-upload', $message);
        }
    }

    /**
     * Метод срабатывающий после удаления шаблона письма
     */
    public function afterDelete(): void
    {
        $this->deleteFile($this->owner->file_name);
    }

    /**
     * Метод срабатывающий после изменения шаблона письма
     * Если изменилось название файла - удаляем старый файл.
     */
    public function beforeUpdate(): void
    {
        if ($this->owner->getDirtyAttributes(['file_name'])){
            $this->deleteFile($this->owner->getOldAttribute('file_name'));
        }
    }


    /**
     * Удаляет файл
     * @param string $filename
     */
    protected function deleteFile(string $filename): void
    {
        try {
            unlink(Yii::getAlias('@files/') . $filename . Template::FILE_EXTENSION);
        } catch (\Exception $exception) {
            Yii::error(['message' => Yii::t('app', 'Не удалось удалить файл: '.$filename)]);
        }
    }

}