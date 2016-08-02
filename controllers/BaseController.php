<?php
/**
  *   基础控制器，设置主题等
  * 
  * @author Sun <sunkang@wstaichi.com>
  * @copyright http://www.wstaichi.com 
  * @time 2016
  */
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class BaseController extends Controller
{
	
	public $theme = 'default';

    public function init(){
        parent::init();
        $this->theme($this->theme);
        $lists_module =  json_decode(\Yii::getAlias('@modules'));
        $module_path =  yii::getAlias('@module_path');
    
        foreach($lists_module as $v){
            $class = '\app\modules\\'.$v.'\Hook';
            $file = $module_path.'/'.$v.'/Hook.php';  
            if(file_exists($file)){          
                $class::init();
            }
       }




    }

    public function theme($theme){
    	\Yii::$app->view->theme = new \yii\base\Theme([
            'pathMap' => ['@app/views' => '@app/themes/'.$theme.'/views'],
            'baseUrl' => '@web',
        ]);
    }
}
