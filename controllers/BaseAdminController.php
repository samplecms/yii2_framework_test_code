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

class BaseAdminController extends BaseController
{
	
	public $theme = 'admin';

    public function init(){
        parent::init();

        
    }
}
