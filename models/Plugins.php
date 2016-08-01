<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "plugins".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $title
 * @property mixed $content
 * @property mixed $auth
 * @property mixed $status
 * @property mixed $sort
 * @property mixed $hook
 */
class Plugins extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'plugins';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
            'content',
            'auth',
            'status',
            'sort',
            'hook',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'auth', 'status', 'sort', 'hook'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'auth' => Yii::t('app', 'Auth'),
            'status' => Yii::t('app', 'Status'),
            'sort' => Yii::t('app', 'Sort'),
            'hook' => Yii::t('app', 'Hook'),
        ];
    }
}
