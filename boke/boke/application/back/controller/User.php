<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/17
 * Time: 17:51
 */

namespace app\back\controller;
use app\back\controller\AdminBase;

class User extends AdminBase
{
    /**
     * 用户列表
     */
    public function index(){
        $word=I('get.word','');
        if (empty($word)) {
            $map=array();
        }else{
            $map=array(
                'username'=>$word
            );
        }
        $assign=model('Users')->getAdminPage($map,'register_time desc');
        $this->assign($assign);
        $this->display();
    }
}