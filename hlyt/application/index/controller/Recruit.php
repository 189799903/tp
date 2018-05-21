<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\View;
use think\Cookie;
use think\Session;
use think\File;
class Recruit  extends Common
{ 
    //招聘信息添加
    public function add()
    {
    	if ($_POST) {
    		$data=$_POST;
    		$ret=Db::table('recruit')->insert($data);
    		if ($ret) {
    			$this->redirect('recruit/show');
    		}
    	}
         return $this->fetch('add');
    }
//招聘信息展示
    public function show(){
     $page=input('page',1);
     $count=Db::table('recruit')->count();//总条数
    $size=5;
    $total=ceil($count/$size); //总页数
    // var_dump($total);die;
    $p['prev']=$page-1<=0?1:$page-1;
    $p['next']=$page+1>=$total?$total:$page+1;
    $p['total']=$total;
    $p['page']=$page<=0?1:$page;
    $limit=($page-1)*$size; //偏移量
    $data=Db::table('recruit')->limit($limit,$size)->order('r_id desc')->select();   
  return   $this->fetch('recruit/show',['data'=>$data,'p'=>$p]);
    }
     //招聘信息删除
    public function dele(){
           $id=$_GET['id'];
           $page=input('page');
           $size=5;
           $count=Db::table('recruit')->count();//总条数
           $total=ceil($count/$size); //总页数
           $p['prev']=$page-1<=0?1:$page-1;
           $p['next']=$page+1>=$total?$total:$page+1;
           $p['total']=$total;
           $p['page']=$page<=0?1:$page;
           $limit=($page-1)*$size; //偏移量
        $res=Db::table('recruit')->where('r_id='.$id)->delete();
        $arr=array(
             'msg'=>0,
             'content'=>''
        );
         if ($res) {
        $data=Db::table('recruit')->limit($limit,$size)->order('r_id desc')->select(); 
        foreach ($data as $key => $value) {
            $data[$key]['page']=$p['page'];
        }
    
         $result['msg']=1;
         // var_dump($data);die;
         $result['content']=$data;
         return json($result);
        }else{
          $result['msg']=1; 
          return json($result);
         }
    }
    //招聘信息修改
    public function update(){
        if ($_POST) {
            $datas=$_POST;
            $id=$_POST['r_id'];
            $ret=Db::table('recruit')->where('r_id='.$id)->update($datas);
            if ($ret) {
                $this->redirect('show');
            }else{
                $this->error('修改失败','recruit/show');
            }
        }
        $id=$_GET['id'];
        $data=Db::table('recruit')->where('r_id='.$id)->find();
        return $this->fetch('update',['data'=>$data]);
    }

}