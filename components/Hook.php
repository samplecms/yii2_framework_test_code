<?php 
/**
  *  HOOK
  * 
  * @author Sun <sunkang@wstaichi.com>
  * @copyright http://www.wstaichi.com 
  * @time 2016
  */
namespace app\components;
 
 
class Hook
{  
 	static $obj = [];  
	static $value;
	 
 	static function listen($name,&$arg = array() ){
 	     
 		$hook = self::$obj[$name];
 		if($hook){
 			foreach($hook as $call){ 
 				$obj = $call['obj'];
 				$method = $call['method'];
 				$obj->$method($arg);
 				 
 			}
 		}
 	}
 	static function value($name,$value = null){
 		if(!$value){
 			return self::$value[$name];
 		}
 		self::$value[$name] = $value;
 	}
 	
 	static function add($name,$obj,$method){
 		self::$obj[$name][] = ['obj'=>$obj,'method'=>$method];
 	}
}