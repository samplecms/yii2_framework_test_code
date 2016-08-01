<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "posts".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $title
 * @property mixed $content
 * @property mixed $created
 * @property mixed $updated
 * @property mixed $uid
 * @property mixed $status
 */
class Posts extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'posts';
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
            'created',
            'updated',
            'uid',
            'status',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'created', 'updated', 'uid', 'status'], 'safe']
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
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'uid' => Yii::t('app', 'Uid'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
