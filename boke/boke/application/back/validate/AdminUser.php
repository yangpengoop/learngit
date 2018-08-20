<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 11:54
 */
namespace app\back\validate;
use think\validate;
class AdminUser extends validate
{
    public $rule=[
        'username'=>"require",
        'password'=>'require'
        ];
}