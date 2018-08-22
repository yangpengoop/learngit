<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/13
 * Time: 15:27
 */

namespace app\back\controller;
use app\back\Controller\AdminBase;

class Artcle extends adminBase
{
    public $artcleType =[
        [
            'id'=>1,
            'name'=>'技术类',
        ],
        [
            'id'=>2,
            'name'=>'生活类',
        ],
    ];

    public function index(){
        $data =model('Artcle')->getArtcleList();//dump($data);die;
        $this->assign('data',$data);
        return $this->fetch();
    }



    /**
     * 添加文章
     * @return mixed
     */
    public function addArtcle(){
        $data = input();
        $this->assign('typelist',$this->artcleType);
        return $this->fetch();
    }

    /**
     * 添加文章action
     */
    public function subAddArtcle(){
        $data = input('post.');
        $res = model('Artcle')->addArtcle($data);
        if($res['code'] === true){
            $this->success('添加成功');
        }else{
            $imgUrl = $this->getContentImgUrl($data['content']);
            if($imgUrl['code'] == 200){
                $this->deleteInvalidImg($imgUrl['msg']);
                $this->error('添加失败',Url('/back/Artcle/addArtcle'));
            }
        }
    }



    /**
     * 获取上传失败的文章内容中的图片路径
     * @param string $str
     * @return array
     */
    private function getContentImgUrl($str=""){
        preg_match_all('#src="([^"]+?)"#',$str,$result);
        if(empty($result[1])){
            return ['code'=>201,'msg'=>'没有img'];
        }else{
            return ['code'=>200,'msg'=>$result[1]];
        }
    }

    /**
     * 删除上传失败的文章内容中的图片
     * @param $data
     */
    private function deleteInvalidImg($data){
        foreach($data as $value){
            unlink($_SERVER['DOCUMENT_ROOT'].$value);
        }
    }


}