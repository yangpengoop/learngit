<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/13
 * Time: 15:27
 */

namespace app\back\controller;


class Artcle
{
    public function showArtcle(){
        return view();
    }


    public function showaddArtcle(){
        $data = input('post.');
        //dump(config('view_replace_str'));
        return view();
    }
}