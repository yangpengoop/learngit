<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 11:38
 */

namespace app\back\model;
use app\back\model\Base as BaseModel;

class AdminNav extends BaseModel
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
        $this->where(array($map))->delete();
        return true;
    }

    /**
     * 获取全部菜单
     * @param  string $type tree获取树形结构 level获取层级结构
     * @return array       	结构数据
     */
    public function getTreeData($type='tree',$order='',$name='name',$child='id',$parent='pid'){
        // 判断是否需要排序
        if(empty($order)){
            $data=$this->select();
        }else{
            $data=$this->order('order_number is null,'.$order)->select()->toArray();
        }
        // 获取树形或者结构数据
        if($type=='tree'){
            $data=\untils\Data::tree($data,'name','id','pid');
        }elseif($type="level"){
            $data=\untils\Data::channelLevel($data,0,'&nbsp;','id');
            // 显示有权限的菜单
            $auth=new \untils\Auth();
            foreach ($data as $k => $v) {
                if ($auth->check($v['mca'],Session('user.id'))) {
                    foreach ($v['_data'] as $m => $n) {
                        if(!$auth->check($n['mca'],Session('user.id'))){
                            unset($data[$k]['_data'][$m]);
                        }
                    }
                }else{
                    // 删除无权限的菜单
                    unset($data[$k]);
                }
            }
        }
        return $data;
    }
}