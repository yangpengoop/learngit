<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/13
 * Time: 15:39
 */

namespace app\back\model;
use app\back\model\Base;

class Artcle extends Base
{
    /**
     * 添加文章
     * @param $data
     * @return array
     */
    public function addArtcle($data){
        if(empty($data)){
            return ['code'=>201,'msg'=>'data is null'];
        }
        $res = $this->validate('Artcle')->save($data);
        if($res == false){
            return ['code'=>false,'msg'=>$this->getError()];
        }else{
            $data['add_time'] = time();
            $result = $this->save($data);
            if($this->id > 0){
                return ['code'=>true,'msg'=>'data add is ok. and add id is '.$this->id];
            }else{
                return ['code'=>false,'msg'=>'data add is error'];
            }

        }
    }

    public function getArtcleList(){
        return $this->select()->toArray();
    }

}