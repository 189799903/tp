<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\View;
use think\Db;
use think\Cookie; 

class Power extends Common
{
    
    //权限添加
    public function add()
    {   


    	if ($_POST) {
    		$math=input("post.");
    		$aa=Db::table("permission")->where("path",$math["path"])->find();
    		// print_r($aa);die;
    		if ($aa) {
    			echo "<script>alert('该权限已经添加');location.href={:url('Power/add')}</script>";
    			die;
    		}
    		$math["create_time"]=time();
    		$res=Db::table("permission")->insert($math);
    		if ($res) {
    			echo '<script>alert("添加成功");location.href="add"</script>';
    		}else{
    			echo '<script>alert("添加失败");location.href="{:url(Power/add)}"</script>';
    		}
    		// print_r($math);
    	}else{
    		$data=Db::table("permission")->select();
	        // print_r($data);die;
	    	$msg=model("power")->getfind($data);
	    	// print_r($msg);die;
	        return $this->fetch("add",["msg"=>$msg]);
    	}
        
    }
    //权限展示
    public function show()
    {
    	$data=Db::table("permission")->select();
    	foreach ($data as $key => $value) {
    		if ($value["p_id"]==0) {
    			$data[$key]["parent"]="顶级权限";
    		}else{
    			$parent=Db::table("permission")->where("id",$value['p_id'])->field("name")->find();
    			
    			$data[$key]["parent"]=$parent["name"];
    		}
    		$data[$key]["create_time"]=date("Y-m-d",$value["create_time"]);
    	}
    	
    	// print_r($data);die;
    	return $this->fetch("show",["data"=>$data]);
    }
  
}