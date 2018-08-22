<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 12:17
 */

namespace app\back\controller;
use app\back\controller\Base;

class AdminBase extends Base
{
    /**
     * 初始化方法
     */
    public function _initialize(){
        parent::_initialize();
        $auth=new \untils\Auth();Session('user.id',88);
        $rule_name=request()->module().'/'.request()->controller().'/'.request()->action();
        $result=$auth->check($rule_name,Session('user.id'));
        if(!$result){
            $this->error('您没有权限访问');
        }
        // 分配菜单数据
        $nav_data=model('AdminNav')->getTreeData('level','order_number,id');
        $assign=array(
            'nav_data'=>$nav_data,
        );
        $this->assign('request_url',$rule_name);
        $this->assign($assign);
        $this->assign('data',json_encode($nav_data));
    }
}