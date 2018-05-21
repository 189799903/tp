<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\View;
use think\Cookie;
use think\Session;
use think\File;
class Cases  extends Common
{ 
    //新闻添加
    public function add()
    {
    	if ($_POST) {
    		$data=$_POST;
       $file = request()->file('case_logo');
    // 移动到框架应用根目录/public/uploads/ 目录下
    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
    if($info){
        //格式 20160820/42a79759f284b767dfcb2a0197904287.jpg
      $data['case_logo']= $info->getSaveName();
    }
      $ret=Db::table('cases')->insert($data);
    		if ($ret) {
    			$this->redirect('cases/show');
    		}
    	}
       return $this->fetch('add');
    }
    //新闻列表展示
    public function show(){
     $page=input('page',1);
     $count=Db::table('cases')->count();//总条数
    $size=5;
    $total=ceil($count/$size); //总页数
    // var_dump($total);die;
    $p['prev']=$page-1<=0?1:$page-1;
    $p['next']=$page+1>=$total?$total:$page+1;
    $p['total']=$total;
    $p['page']=$page<=0?1:$page;
    $limit=($page-1)*$size; //偏移量
    $data=Db::table('cases')->limit($limit,$size)->order('case_id desc')->select(); 	
  return   $this->fetch('cases/show',['data'=>$data,'p'=>$p]);
    }
    //新闻删除
    public function dele(){
    	   $id=$_GET['id'];
    	   $page=input('page');
    	   $size=5; //每页条数
    	   $count=Db::table('cases')->count();//总条数
    	   $total=ceil($count/$size); //总页数
		   $p['prev']=$page-1<=0?1:$page-1; //上一页
		   $p['next']=$page+1>=$total?$total:$page+1; //下一页
		   $p['total']=$total;  //总页数
		   $p['page']=$page<=0?1:$page;  //当前页
		   $limit=($page-1)*$size; //偏移量
    	//var_dump($id);die;
    	$res=Db::table('cases')->where('case_id='.$id)->delete();
    	//var_dump($res);die;
    	$arr=array(
             'msg'=>0,
             'content'=>''
    	);
    	 if ($res) {
    	$data=Db::table('cases')->limit($limit,$size)->order('case_id desc')->select(); 
        //删除后分页 传值当前页
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
    //新闻修改
    public function update(){
    	if ($_POST) {
    		$datas=$_POST;
    		$id=$_POST['case_id'];
     $file = request()->file('case_logo');
    // 移动到框架应用根目录/public/uploads/ 目录下
    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
    if($info){
        //格式 20160820/42a79759f284b767dfcb2a0197904287.jpg
      $datas['case_logo']= $info->getSaveName();
    }
    		$ret=Db::table('cases')->where('case_id='.$id)->update($datas);
    		if ($ret) {
    			$this->redirect('show');
    		}else{
    			$this->error('修改失败','cases/show');
    		}
    	}
    	$id=$_GET['id'];
    	$data=Db::table('cases')->where('case_id='.$id)->find();
    	return $this->fetch('update',['data'=>$data]);
    }
}
