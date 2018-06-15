<?php
class String{
	/**
	 * 随机生成字符串
	 */
	public static function createNum(){
        $yCode=array('A','B','C','D','E','F','G','H','I','J');
        $orderSn=$yCode[intval(date('Y'))-2017].strtoupper(dechex(date('m'))).date('d').substr(time(),-5).substr(microtime(),2,5).sprintf('%02d',rand(0,99));
        return $orderSn;
	}
}