<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "videos".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $title
 * @property mixed $image
 * @property mixed $urls
 * @property mixed $status
 * @property mixed $content
 * @property mixed $created
 * @property mixed $updated
 * @property mixed $uid
 * @property mixed $sort
 * @property mixed $top
 */
class Videos extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'videos';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
            'image',
            'urls',
            'status',
            'content',
            'created',
            'updated',
            'uid',
            'sort',
            'top',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image', 'urls', 'status', 'content', 'created', 'updated', 'uid', 'sort', 'top'], 'safe']
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
            'image' => Yii::t('app', 'Image'),
            'urls' => Yii::t('app', 'Urls'),
            'status' => Yii::t('app', 'Status'),
            'content' => Yii::t('app', 'Content'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'uid' => Yii::t('app', 'Uid'),
            'sort' => Yii::t('app', 'Sort'),
            'top' => Yii::t('app', 'Top'),
        ];
    }
}
