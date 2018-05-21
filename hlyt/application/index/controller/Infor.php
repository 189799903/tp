<?php
namespace app\index\controller;
use think\Controller;
use think\View;
 use think\Request;
use think\Db;
use think\Cookie; 

class Infor extends Common
{

    public function infor()
    {
        return $this->fetch('infor/infor');
    }
    public function add()
    {
        if(Request::instance()->isPost()){
            $data=input('post.');
            $file = request()->file('infor_img');
        
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    // 成功上传后 获取上传信息
                        $bb=$info->getSaveName();
                          $data['infor_img']= $bb; 
                 
                }
            }
        

            

            // print_r($data);die;
            $res=Db::table('infor')->insert($data);
            if($res){
           
                  $this->redirect(url('infor/show'));
            }else
            {
                $this->error('cuowu'); die;
            }
        }else{
            return $this->fetch('add');
        }
        

    }
    public function show()
    {
        $list=Db::table("Infor")->select();
        $this->assign('list',$list);
        return $this->fetch('infor/show');
    }
    public function dele()
    {
        $infor_id=$_GET['infor_id'];
        
        $res=Db::table("Infor")->where("infor_id='$infor_id'")->delete();
        if($res)
        {
              $this->redirect(url('infor/show'));
        }
    }
    public function update()
    {
        if(Request::instance()->isGet()){
            $id=input('get.infor_id');
            // print_r($id);die;
            $data=Db::table('Infor')->where('infor_id',$id)->find();
            $this->assign('data',$data);
            return $this->fetch('infor/update');
        }else{
            $id=input('post.infor_id');
            $post=input('post.');
        $res=Db::table('Infor')->where('infor_id',$id)->update($post);
            if($res){
                $this->redirect('infor/show');
            }else{
                echo "失败";
            }
        }
    }
   



}
