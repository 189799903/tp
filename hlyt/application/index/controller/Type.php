<?php
namespace app\index\controller;

use app\index\model\Product_model;
use think\Controller;
use think\Request;
use think\Db;

class Type extends Common
{
	//产品类型添加
	public function add()
	{
		if(request()->isPost())
		{
			$data=request()->Post();
			$product=new Product_model();
//			print_r($data);die;
			$res=$product->addOne($data);
			if($res)
			{
				return $this->redirect("show");
			}
			else
			{
				return $this->redirect("add");
			}
		}
		else
		{
			return $this->fetch();
		}
	}
	//产品类型展示
	public function show()
	{
		$page=input("get.page") ? input("get.page") : 1;
		$size=5;
		$num=Db::table("product")->count();
		$page_num=ceil($num/$size);
		$p["page"]=$page <= 1 ? 1 : $page;
        $p["prev"]=$page-1 <= 1 ? 1 : $page-1;
        $p["next"]=$page+1 >= $page_num ? $page_num : $page+1;
        $p["num"]=$num;
        $p["page_num"]=$page_num;
		$product=new Product_model();
		$data=$product->showAll($page,$size);
		$this->assign("data",$data);
		$this->assign("page",$p);
		return $this->fetch();
	}
	//产品类型删除
	public function dele()
	{
		$p_id=input("get.id");
		$product=new Product_model();
		$res=$product->delOne($p_id);
		if($res)
		{
			$this->redirect("show");
		}
		else
		{
			$this->error("删除失败");
		}
	}
	//产品类型修改
	public function update()
	{
		if(request()->isGet())
		{
			$p_id=input("get.id");
			$product=new Product_model();
			$data=$product->showOne($p_id);
			$this->assign("data",$data);
			return $this->fetch();
		}
		else
		{
			$data=input("post.");
//			print_r($data);
			$p_id=$data["p_id"];
			unset($data["p_id"]);
			$product=new Product_model();
			$res=$product->upOne($p_id,$data);
//			die;
			if($res)
			{
				return $this->redirect("show");
			}
			else
			{
				return $this->error("修改失败！！！");
			}
		
		
		}
	}

}
