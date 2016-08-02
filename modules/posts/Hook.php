<?php

namespace app\modules\posts;

 
class Hook 
{
     
    static function init()
    {
        
        \app\components\Hook::add('admin-theme-menu','\app\modules\posts\Hook@menu');
 
    }

    static function menu(&$menu){
         $menu[] = ['label' => \Yii::t('app','Posts'), 'url' => ['/posts/posts/index']];
    }
}
