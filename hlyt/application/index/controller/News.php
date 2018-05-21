<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\View;
use think\Cookie;
use think\Session;
use think\File;
class News  extends Common
{ 
    //新闻添加
    public function add()
    {
    	if ($_POST) {
    		$data=$_POST;
    		$data['n_time']=time();
    		$ret=Db::table('news')->insert($data);
    		if ($ret) {
    			$this->redirect('news/show');
    		}
    	}
    	$n_type=Db::table('n_type')->select();
       return $this->fetch('add',['n_type'=>$n_type]);
    }
    //新闻列表展示
    public function show(){
     $page=input('page',1);
     $count=Db::table('news')->count();//总条数
    $size=5;
    $total=ceil($count/$size); //总页数
    // var_dump($total);die;
    $p['prev']=$page-1<=0?1:$page-1;
    $p['next']=$page+1>=$total?$total:$page+1;
    $p['total']=$total;
    $p['page']=$page<=0?1:$page;
    $limit=($page-1)*$size; //偏移量
    $data=Db::table('news')->limit($limit,$size)->join('n_type','news.n_type=n_type.t_id')->order('n_id desc')->select(); 	
  return   $this->fetch('news/show',['data'=>$data,'p'=>$p]);
    }
    //新闻删除
    public function dele(){
    	   $id=$_GET['id'];
    	   $page=input('page');
    	   $size=5; //每页条数
    	   $count=Db::table('news')->count();//总条数
    	   $total=ceil($count/$size); //总页数
		   $p['prev']=$page-1<=0?1:$page-1; //上一页
		   $p['next']=$page+1>=$total?$total:$page+1; //下一页
		   $p['total']=$total;  //总页数
		   $p['page']=$page<=0?1:$page;  //当前页
		   $limit=($page-1)*$size; //偏移量
    	//var_dump($id);die;
    	$res=Db::table('news')->where('n_id='.$id)->delete();
    	//var_dump($res);die;
    	$arr=array(
             'msg'=>0,
             'content'=>''
    	);
    	 if ($res) {
    	$data=Db::table('news')->limit($limit,$size)->join('n_type','news.n_type=n_type.t_id')->order('n_id desc')->select(); 
        //删除后分页 传值当前页
    	foreach ($data as $key => $value) {
    		$data[$key]['time']=date('Y-m-d H:i:s',$value['n_time']);
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
    //新闻修改
    public function update(){
    	if ($_POST) {
    		$datas=$_POST;
    		$id=$_POST['n_id'];
    		$ret=Db::table('news')->where('n_id='.$id)->update($datas);
    		if ($ret) {
    			$this->redirect('show');
    		}else{
    			$this->error('修改失败','news/show');
    		}
    	}
    	$id=$_GET['id'];
    	$data=Db::table('news')->where('n_id='.$id)->find();
    	return $this->fetch('update',['data'=>$data]);
    }
}
