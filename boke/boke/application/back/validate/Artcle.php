<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/22
 * Time: 12:09
 */

namespace app\back\validate;
use think\Validate;

class Artcle extends Validate
{
    public $rule  =[
        'title'=>"require",
        'type'=>"require",
        'content'=>"require",
    ];
}