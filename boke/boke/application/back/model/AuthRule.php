<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 11:24
 */

namespace app\back\model;
use app\back\model\Base as BaseModel;

class AuthRule extends BaseModel
{
    /**
     * 删除数据
     * @param	array	$map	where语句数组形式
     * @return	boolean			操作是否成功
     */
    public function deleteData($map){
        $count=$this
            ->where(array('pid'=>$map['id']))
            ->count();
        if($count!=0){
            return false;
        }
        $result=$this->where($map)->delete();
        return $result;
    }
}