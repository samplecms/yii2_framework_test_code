<?php

namespace app\modules\posts;
use app;
use Yii;
/**
 * posts module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\posts\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        app\components\Hook::add('admin-theme-menu',$this,'menu');

        // custom initialization code goes here
    }

    public function menu(&$menu){
         $menu[] = ['label' => Yii::t('app','Posts'), 'url' => ['/posts/posts/index']];
    }
}
