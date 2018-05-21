<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\View;
use think\Db;
use think\Cookie; 

class Role extends Common
{
    
    //角色添加
    public function add()
    {   
    	if ($_POST) {
    		$data=input("post.");
    		if(Db::table("role")->where("name",$data['name'])->find()){
    			echo "<script>alert('该角色已经添加');location.href='add'</script>";
    		}else{
    			$data1=$data;
	    		unset($data['permission_id']);
	    		Db::table("role")->insert($data);
	    		$role_id=Db::table("role")->getLastInsID();
	    		if ($role_id) {
	    			$arr=array();
	    			foreach ($data1["permission_id"] as $key => $value) {
	    				$arr[$key]['permission_id']=$value;
	    				$arr[$key]["role_id"]=$role_id;
	    			}
	    			if(Db::name('role_permission')->insertAll($arr)){
	    				echo "<script>alert('角色添加成功');location.href='add'</script>";
	    			}else{
	    				echo "<script>alert('角色添加失败');location.href='add'</script>";
	    			}
	    		}

    		}
    		
    		// print_r($data1);
    		// print_r($data);
    	}else{
    	   $data=Db::table("permission")->select();

    	   $msg=model("power")->getselect($data);
    	   // print_r($msg);die;
    	   return $this->fetch("add",["list"=>$msg]);	
    	}
        
    }
    public function show()
    {
    	$data=Db::table("role")->select();
    	return $this->fetch("show",["list"=>$data]);
    	// print_r($data);die;
    }
  
}