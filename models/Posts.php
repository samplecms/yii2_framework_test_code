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
    static $self;
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
            'category_id',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content','category_id', 'created', 'updated', 'uid', 'status'], 'safe']
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
            'Cagegory_Name' => Yii::t('app', 'Cagegory_Name'),
        ];
    }
    public function beforeSave($data){

        parent::beforeSave($data);
        if($this->isNewRecord){
             $this->created  =  time();
             
        }


        $this->updated  =  time();

        return true;
    }
    public function getCreate_At(){

        return date('Y-m-d', $this->created);
    }

    public function getCategory()
    {
        $cid = 'category'.$this->category_id;
  
        $data = static::$self[$cid];
        if(!$data){
            $data =  Category::find()->where([ '_id'=> $this->category_id ])->one();

            static::$self[$cid] = $data;
        }
        return $data;
    }


    function getCagegory_Name(){
            $name = $this->category['title'];
            return $name;
    }


}
