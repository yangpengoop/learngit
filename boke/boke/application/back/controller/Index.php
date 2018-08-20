<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 12:28
 */

namespace app\back\controller;
use app\back\controller\AdminBase;

class Index extends AdminBase
{
    /**
     * 首页
     */
    public function index(){
        return $this->fetch();
    }
    /**
     * elements
     */
    public function elements(){

        $this->display();
    }

    /**
     * welcome
     */
    public function welcome(){
        return $this->fetch();
    }
}