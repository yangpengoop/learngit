<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/17
 * Time: 17:53
 */

namespace app\back\validate;
use think\validate;

class User extends validate
{
    public $rule=[
        'username'=>'require',
    ];
}