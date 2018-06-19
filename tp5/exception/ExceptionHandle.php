<?php
/**
 * Created by PhpStorm.
 * User: TanChengjin
 * Date: 2018/6/19
 * Time: 15:01
 */

namespace app\lib\exception;
use Exception;
use think\Exception\Handle;
use think\Request;

class ExceptionHandle extends Handle
{
    //HTTP状态码
    private $code;
    //具体错误消息
    private $msg;
    //自定义错误号
    private $errCode;
    public function render(Exception $e){
        if($e instanceof BaseException){
            $this->code=$e->code;
            $this->msg=$e->msg;
            $this->errCode=$e->errCode;
        }else{
            //如果调试模式开启
            if(config('app_debug')){
                return parent::render($e);
            }else{
                //调试模式未开启
                $this->code=500;
                $this->msg='服务器内部错误';
                $this->errCode=99999;
            }
        }
        $result=[
            'msg'=>$this->msg,
            'errCode'=>$this->errCode,
            'url'=>Request::instance()->url(),
        ];
        //返回json格式,并设置HTTP状态码
        return json($result,$this->code);
    }
}