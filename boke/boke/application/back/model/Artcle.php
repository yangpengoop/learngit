<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/13
 * Time: 15:39
 */

namespace app\back\model;
use think\model;

class Artcle extends model
{
    public function addArtcle($data){
        if(empty($data)){
            return ['code'=>201,'msg'=>'data is null'];
        }

    }
}