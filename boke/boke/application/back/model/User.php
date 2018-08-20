<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/17
 * Time: 17:49
 */

namespace app\back\model;
use app\back\model\Base;

class User extends Base
{
    /**
     * 添加用户
     */
    public function addData($data){
        // 对data数据进行验证
        if(!validate('User')->check($data)){
            // 验证不通过返回错误
            return false;
        }else{
            // 验证通过
            $result=$this->save($data);
            return $result;
        }
    }

    /**
     * 修改用户
     */
    public function editData($map,$data){
        // 对data数据进行验证
        if(!$data=$this->create($data)){
            // 验证不通过返回错误
            return false;
        }else{
            // 验证通过
            $result=$this
                ->where(array($map))
                ->save($data);
            return $result;
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