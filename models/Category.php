<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "category".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $title
 * @property mixed $created
 * @property mixed $updated
 * @property mixed $uid
 * @property mixed $status
 * @property mixed $sort
 */
class Category extends \yii\mongodb\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
            'created',
            'updated',
            'uid',
            'status',
            'sort',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', ], 'required'],
            [['title', 'created', 'updated', 'uid', 'status', 'sort'], 'safe']
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
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'uid' => Yii::t('app', 'Uid'),
            'status' => Yii::t('app', 'Status'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['_id' => 'category_id']);
    }



}
