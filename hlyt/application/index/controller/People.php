<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\View;
use think\Db;
use think\Cookie; 

class People extends Common
{
    
    //人员添加
    public function add()
    {   
    	if ($_POST) {
    		$msg=input("post.");
    		$msg['password']=md5($msg['password']);

    			$data1=$msg;
	    		unset($msg['role_id']);
	    		Db::table("user")->insert($msg);
	    		$user_id=Db::table("user")->getLastInsID();
	    		if ($user_id) {
	    			$arr=array();
	    			foreach ($data1["role_id"] as $key => $value) {
	    				$arr[$key]['role_id']=$value;
	    				$arr[$key]["user_id"]=$user_id;
	    			}
	    			if(Db::name('user_role')->insertAll($arr)){
	    				echo "<script>alert('人员添加成功');location.href='add'</script>";
	    			}else{
	    				echo "<script>alert('人员添加失败');location.href='add'</script>";
	    			}
	    		}

    		
    		// print_r($msg);
    	}else{
    		$data=Db::table("role")->field(['id','name'])->select();
	    	// print_r($data);die;
	        return $this->fetch("add",["data"=>$data]);
    	}
    	
    }
    public function show()
    {
    	$data=Db::table("user")->select();
    	return $this->fetch("show",["list"=>$data]);
    	// print_r($data);die;
    }
  
}