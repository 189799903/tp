<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\View;
use think\Cookie;
use think\Session;
use think\File;
class Newstype  extends Common
{ 
    //新闻添加
    public function add()
    {
    	if ($_POST) {
    		$data=$_POST;
    		$ret=Db::table('n_type')->insert($data);
    		if ($ret) {
    			$this->redirect('newstype/show');
    		}
    	}
       return $this->fetch('add');
    }
    //新闻类型展示
    public function show(){
     $page=input('page',1);
     $count=Db::table('n_type')->count();//总条数
    $size=3;
    $total=ceil($count/$size); //总页数
    // var_dump($total);die;
    $p['prev']=$page-1<=0?1:$page-1;
    $p['next']=$page+1>=$total?$total:$page+1;
    $p['total']=$total;
    $p['page']=$page<=0?1:$page;
    $limit=($page-1)*$size; //偏移量
    $data=Db::table('n_type')->limit($limit,$size)->order('t_id desc')->select(); 	
  return   $this->fetch('newstype/show',['data'=>$data,'p'=>$p]);
    }   
      //新闻类型删除
    public function dele(){
           $id=$_GET['id'];
           $page=input('page');
           $size=3;
           $count=Db::table('n_type')->order('t_id desc')->count();//总条数
           $total=ceil($count/$size); //总页数
           $p['prev']=$page-1<=0?1:$page-1;
           $p['next']=$page+1>=$total?$total:$page+1;
           $p['total']=$total;
           $p['page']=$page<=0?1:$page;
           $limit=($page-1)*$size; //偏移量
        //var_dump($id);die;
        $res=Db::table('n_type')->where('t_id='.$id)->delete();
        //var_dump($res);die;
        $arr=array(
             'msg'=>0,
             'content'=>''
        );
         if ($res) {
        $data=Db::table('n_type')->limit($limit,$size)->order('t_id desc')->select(); 
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
    //新闻类型修改
    public function update(){
        if ($_POST) {
            $datas=$_POST;
            $id=$_POST['t_id'];
            $ret=Db::table('n_type')->where('t_id='.$id)->update($datas);
            if ($ret) {
                $this->redirect('show');
            }else{
                $this->error('修改失败','newstype/show');
            }
        }
        $id=$_GET['id'];
        $data=Db::table('n_type')->where('t_id='.$id)->find();
        return $this->fetch('update',['data'=>$data]);
    }
}