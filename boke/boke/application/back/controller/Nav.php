<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 12:25
 */

namespace app\back\controller;
use app\back\controller\AdminBase;

class Nav extends AdminBase
{
    /**
     * 菜单列表
     */
    public function index(){
        $data=model('AdminNav')->getTreeData('tree','order_number,id');//dump($data);die;
        $assign=array(
            'data'=>$data
        );
        $this->assign($assign);
        return $this->fetch();
    }

    /**
     * 添加菜单
     */
    public function add(){
        $data=input('post.');
        unset($data['id']);
        $result=model('AdminNav')->addData($data);
        if ($result) {
            $this->success('添加成功',Url('back/Nav/index'));
        }else{
            $this->error('添加失败');
        }
    }

    /**
     * 修改菜单
     */
    public function edit(){
        $data=input('post.');
        $map=array(
            'id'=>$data['id']
        );
        $result=model('AdminNav')->editData($map,$data);
        if ($result) {
            $this->success('修改成功',Url('back/Nav/index'));
        }else{
            $this->error('修改失败');
        }
    }

    /**
     * 删除菜单
     */
    public function delete(){
        $id=input('get.id');
        $map=array(
            'id'=>$id
        );
        $result=model('AdminNav')->deleteData($map);
        if($result){
            $this->success('删除成功',Url('back/Nav/index'));
        }else{
            $this->error('请先删除子菜单');
        }
    }

    /**
     * 菜单排序
     */
    public function order(){
        $data=input('post.');
        $result=model('AdminNav')->orderData($data);
        if ($result) {
            $this->success('排序成功',Url('back/Nav/index'));
        }else{
            $this->error('排序失败');
        }
    }
}