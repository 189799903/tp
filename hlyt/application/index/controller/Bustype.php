<?php
namespace app\index\controller;

use app\index\model\Type_model;
use think\Controller;
use think\Request;
use think\Db;

class Bustype extends Common
{
	public function add()
	{
		//公司业务类型添加
		if(request()->isPost())
		{
			$data=request()->Post();
			$file = request()->file('type_img');	
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
			if($info)
			{
				$data["type_img"]=$info->getSaveName();
			}
			else
			{	
				return $file->getError();
			}
			$type=new Type_model();
//			print_r($data);die;
			$res=$type->addOne($data);
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
	//公司业务类型展示
	public function show()
	{
		$page=input("get.page") ? input("get.page") : 1;
		$size=5;
		$num=Db::table("type")->count();
		$page_num=ceil($num/$size);
		$p["page"]=$page <= 1 ? 1 : $page;
        $p["prev"]=$page-1 <= 1 ? 1 : $page-1;
        $p["next"]=$page+1 >= $page_num ? $page_num : $page+1;
        $p["num"]=$num;
        $p["page_num"]=$page_num;
		$type=new Type_model();
		$data=$type->showAll($page,$size);
		$this->assign("data",$data);
		$this->assign("page",$p);
		return $this->fetch();
	}
	//公司业务类型删除
	public function dele()
	{
		$type_id=input("get.id");
		$type=new Type_model();
		$res=$type->delOne($type_id);
		if($res)
		{
			$this->redirect("show");
		}
		else
		{
			$this->error("删除失败");
		}
	}
	//公司业务类型修改
	public function update()
	{
		if(request()->isGet())
		{
			$type_id=input("get.id");
			$type=new Type_model();
			$data=$type->showOne($type_id);
//			print_r($data);die;
			$this->assign("data",$data);
			return $this->fetch();
		}
		else
		{
			$data=input("post.");
			$file = request()->file('type_img');
//			print_r();die;
			if(empty($file))
			{
				$type_id=$data["type_id"];
				$data["type_img"]=$data["img"];
				unset($data["type_id"]);
				unset($data["img"]);
//				print_r($data);die;
				$type=new Type_model();
				$res=$type->upOne($type_id,$data);
				if($res)
				{
					return $this->redirect("show");
				}
				else
				{
					return $this->error("修改失败！！！");
				}
			}
			else
			{
				$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
				if($info)
				{
					$data["type_img"]=$info->getSaveName();
				}
				else
				{			
					return $file->getError();
				}
				$type_id=$data["type_id"];
				unset($data["type_id"]);
				unset($data["img"]);
//				print_r($type_id);die;
				$type=new Type_model();
//				print_r($data);die;
				$res=$type->upOne($type_id,$data);
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
}
