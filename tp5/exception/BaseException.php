<?php
/**
 * Created by PhpStorm.
 * User: TanChengjin
 * Date: 2018/6/19
 * Time: 14:51
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends \Exception
{
    //HTTP状态码
    public $code=400;
    //具体错误消息
    public $msg='请求需要验证';
    //自定义错误号
    public $errCode=40000;
    public function __construct($params=[])
    {
        if(!is_array($params)){
            throw new Exception('参数必须是数组');
        }
        if(array_key_exists('code',$params)){
            $this->code=$params['code'];
        }
        if(array_key_exists('msg',$params)){
            $this->msg=$params['msg'];
        }
        if(array_key_exists('errCode',$params)){
            $this->errCode=$params['errCode'];
        }
    }
}