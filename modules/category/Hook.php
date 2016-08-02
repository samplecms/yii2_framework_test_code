<?php

namespace app\modules\category;

 
class Hook 
{
     
    static function init()
    {
        
        \app\components\Hook::add('admin-theme-menu','\app\modules\category\Hook@menu');
 
    }

    static function menu(&$menu){
         $menu[] = ['label' => \Yii::t('app','Category'), 'url' => ['/category/category/index']];
    }
}
