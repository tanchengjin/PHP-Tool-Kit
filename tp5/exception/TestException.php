<?php
/**
 * Created by PhpStorm.
 * User: TanChengjin
 * Date: 2018/6/19
 * Time: 15:18
 */

namespace app\lib\exception;


class TestException extends BaseException
{
    public $code=500;
    public $msg=100;
    public $errCode=100;
}