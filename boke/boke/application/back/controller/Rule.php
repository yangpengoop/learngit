<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 11:03
 */

namespace app\back\controller;
use app\back\controller\AdminBase;
/**
 * 后台权限管理
 * Class Rule
 * @package app\back\controller
 */
class Rule extends AdminBase
{

    /**
     * 菜单列表
     */
    public function index(){
        $data = model('AuthRule')->getTreeData();
        $this->assign('data',$data);
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
            $this->success('添加成功',Url('Admin/Nav/index'));
        }else{
            $this->error('添加失败');
        }
    }

    /**
     * 修改权限
     */
    public function edit(){
        $data=input('post.');
        $map=array(
            'id'=>$data['id']
        );
        $result=model('AuthRule')->editData($map,$data);
        if ($result) {
            $this->success('修改成功',Url('back/Rule/index'),'',1);
        }else{
            $this->error('修改失败');
        }
    }

    /**
     * 删除权限
     */
    public function delete(){
        $id=input('get.id');
        $map=array(
            'id'=>$id
        );
        $result=model('AuthRule')->deleteData($map);
        if($result){
            $this->success('删除成功',Url('back/Rule/index'));
        }else{
            $this->error('请先删除子权限');
        }

    }

    //*******************用户组**********************
    /**
     * 用户组列表
     */
    public function group(){
        $data=model('AuthGroup')->select();
        $assign=array(
            'data'=>$data
        );
        $this->assign($assign);
        return $this->fetch();
    }

    /**
     * 添加用户组
     */
    public function add_group(){
        $data=input('post.');
        unset($data['id']);
        $result=model('AuthGroup')->addData($data);
        if ($result) {
            $this->success('添加成功',Url('back/Rule/group'));
        }else{
            $this->error('添加失败');
        }
    }

    /**
     * 修改用户组
     */
    public function edit_group(){
        $data=input('post.');
        $map=array(
            'id'=>$data['id']
        );
        $result=model('AuthGroup')->editData($map,$data);
        if ($result) {
            $this->success('修改成功',Url('back/Rule/group'));
        }else{
            $this->error('修改失败');
        }
    }

    /**
     * 删除用户组
     */
    public function delete_group(){
        $id=input('get.id',0,'intval');
        $map=array(
            'id'=>$id
        );
        $result=model('AuthGroup')->deleteData($map);
        if ($result) {
            $this->success('删除成功',Url('back/Rule/group'));
        }else{
            $this->error('删除失败');
        }
    }

    //*****************权限-用户组*****************
    /**
     * 分配权限
     */
    public function rule_group(){
        if(request()->isPost()){
            $data=input('post.');
            $map=array(
                'id'=>$data['id']
            );

            $data['rules']=implode(',', $data['rule_ids']);
            unset($data['rule_ids']);
            $result=model('AuthGroup')->editData($map,$data);
            if ($result) {
                $this->success('操作成功',Url('back/Rule/group'));
            }else{
                $this->error('操作失败');
            }
        }else{
            $id=input('id');
            // 获取用户组数据
            $group_data=model('Auth_group')->where(array('id'=>$id))->find()->toArray();
            $group_data['rules']=explode(',', $group_data['rules']);
            // 获取规则数据
            $rule_data=model('AuthRule')->getTreeData('level','id','title');
            $assign=array(
                'group_data'=>$group_data,
                'rule_data'=>$rule_data
            );

            $this->assign($assign);
            return $this->fetch();
        }

    }
//******************用户-用户组*******************
    /**
     * 添加成员
     */
    public function check_user(){
        $username=input('get.username','');
        $group_id=input('group_id');
        $group_name=model('Auth_group')->getFieldById($group_id,'title');
        $uids=model('AuthGroupAccess')->getUidsByGroupId($group_id);
        // 判断用户名是否为空
        if(empty($username)){
            $user_data='';
        }else{
            $user_data=model('AdminUser')->where(['username'=>$username])->select()->toArray();
        }
        $assign=array(
            'group_name'=>$group_name,
            'uids'=>$uids,
            'user_data'=>$user_data,
        );
        $this->assign($assign);
        return $this->fetch();
    }

    /**
     * 添加用户到用户组
     */
    public function add_user_to_group(){
        $data=input('get.');
        $map=array(
            'uid'=>$data['uid'],
            'group_id'=>$data['group_id']
        );
        $count=model('AuthGroupAccess')->where($map)->count();
        if($count==0){
            model('AuthGroupAccess')->addData($data);
        }
        $this->success('操作成功',Url('back/Rule/check_user',array('group_id'=>$data['group_id'],'username'=>$data['username'])));
    }

    /**
     * 将用户移除用户组
     */
    public function delete_user_from_group(){
        $map=input('get.');
        $result=model('AuthGroupAccess')->deleteData($map);
        if ($result) {
            $this->success('操作成功',Url('back/Rule/admin_user_list'));
        }else{
            $this->error('操作失败');
        }
    }

    /**
     * 管理员列表
     */
    public function admin_user_list(){
        $data=model('AuthGroupAccess')->getAllData();dump($data);die;
        $assign=array(
            'data'=>$data
        );
        $this->assign($assign);
        $this->display();
    }

    /**
     * 添加管理员
     */
    public function add_admin(){
        if(IS_POST){
            $data=input('post.');
            $result=model('AdminUser')->addData($data);
            if($result){
                if (!empty($data['group_ids'])) {
                    foreach ($data['group_ids'] as $k => $v) {
                        $group=array(
                            'uid'=>$result,
                            'group_id'=>$v
                        );
                        model('AuthGroupAccess')->addData($group);
                    }
                }
                // 操作成功
                $this->success('添加成功',Url('back/Rule/admin_user_list'));
            }else{
                $error_word=moder('AdminUser')->getError();
                // 操作失败
                $this->error($error_word);
            }
        }else{
            $data=model('AuthGroup')->select();
            $assign=array(
                'data'=>$data
            );
            $this->assign($assign);
            $this->display();
        }
    }

    /**
     * 修改管理员
     */
    public function edit_admin(){
        if(IS_POST){
            $data=input('post.');
            // 组合where数组条件
            $uid=$data['id'];
            $map=array(
                'id'=>$uid
            );
            // 修改权限
            model('AuthGroupAccess')->deleteData(array('uid'=>$uid));
            foreach ($data['group_ids'] as $k => $v) {
                $group=array(
                    'Urlid'=>$uid,
                    'group_id'=>$v
                );
                model('AuthGroupAccess')->addData($group);
            }
            $data=array_filter($data);
            // 如果修改密码则md5
            if (!empty($data['password'])) {
                $data['password']=md5($data['password']);
            }
            // p($data);die;
            $result=model('Users')->editData($map,$data);
            if($result){
                // 操作成功
                $this->success('编辑成功',Url('back/Rule/edit_admin',array('id'=>$uid)),'',1);
            }else{
                $error_word=model('AdminUser')->getError();
                if (empty($error_word)) {
                    $this->success('编辑成功',Url('back/Rule/edit_admin',array('id'=>$uid)),'',1);
                }else{
                    // 操作失败
                    $this->error($error_word);
                }

            }
        }else{
            $id=input('get.id',0,'intval');
            // 获取用户数据
            $user_data=model('AdminUser')->find($id);
            // 获取已加入用户组
            $group_data=M('AuthGroupAccess')
                ->where(array('uid'=>$id))
                ->getField('group_id',true);
            // 全部用户组
            $data=model('AuthGroup')->select();
            $assign=array(
                'data'=>$data,
                'user_data'=>$user_data,
                'group_data'=>$group_data
            );
            $this->assign($assign);
            $this->display();
        }
    }

}