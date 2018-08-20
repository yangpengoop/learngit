<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 11:45
 */

namespace app\back\model;
use app\back\model\Base;

class AuthGroup extends Base
{
    /**
     * 传递主键id删除数据
     * @param  array   $map  主键id
     * @return boolean       操作是否成功
     */
    public function deleteData($map){
        $result=$this->where($map)->delete();
        if ($result) {
            $group_map=array(
                'group_id'=>$map['id']
            );
            // 删除关联表中的组数据
            $result=model('AuthGroupAccess')->deleteData($group_map);
        }
        return true;
    }
}