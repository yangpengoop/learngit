<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 12:03
 */

namespace app\back\model;
use app\back\model\Base;
use app\back\validate\AdminUserValidate;
class AdminUser extends Base
{
    /**
     * 添加用户
     */
    public function addData($data){
        // 对data数据进行验证
        $v_data['username']=$data['username'];
        $v_data['phone']=$data['phone'];
        $v_data['email']=$data['email'];
        $v_data['password']=$data['password'];
        $v_data['status']=$data['status'];
        $res = $this->validate('AdminUserValidate')->save($v_data);
        unset($v_data['group_id']);
        if(!$res ){
            // 验证不通过返回错误
            return ['code'=>false,'msg'=>$this->getError()];
        }else{
            // 验证通过
            $result=$this->save($v_data);
            return ['code'=>true,'msg'=>$this->id];
        }
    }

    /**
     * 修改用户
     */
    public function editData($map,$data){
        // 对data数据进行验证
        $v_data['username']=$data['username'];
        $v_data['id']=$data['id'];
        if(isset($data['phone'])){
            $v_data['phone']=$data['phone'];
        }
        if(isset($data['email'])){
            $v_data['email']=$data['email'];
        }
        if(isset($data['password'])){
            $v_data['password']=$data['password'];
        }
        $v_data['status']=$data['status'];//dump($data);die;
        if(!$data=$this->validate('adminUserValidate')->update($v_data)){
            // 验证不通过返回错误
            return ['code'=>false,'msg'=>$this->getError()];
        }else{

            return ['code'=>true,'msg'=>$data['id']];
        }
    }

    /**
     * 删除数据
     * @param   array   $map    where语句数组形式
     * @return  boolean         操作是否成功
     */
    public function deleteData($map){
        die('禁止删除用户');
    }
}