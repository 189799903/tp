<?php
namespace app\index\controller;

use app\index\model\Skill_model;
use think\Controller;
use think\Request;
use think\Db;


class Skill extends Common
{
	//技术设计添加
	public function add()
	{
		if(request()->isPost())
		{
			$data=request()->Post();
			$file = request()->file('skill_logo');	
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
			if($info)
			{
				$data["skill_logo"]=$info->getSaveName();
			}
			else
			{			
				return $file->getError();
			}
			$skill=new Skill_model();
//			print_r($data);die;
			$res=$skill->addOne($data);
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
	//技术设计展示
	public function show()
	{
		$page=input("get.page") ? input("get.page") : 1;
		$size=5;
		$num=Db::table("skill")->count();
		$page_num=ceil($num/$size);
		$p["page"]=$page <= 1 ? 1 : $page;
        $p["prev"]=$page-1 <= 1 ? 1 : $page-1;
        $p["next"]=$page+1 >= $page_num ? $page_num : $page+1;
        $p["num"]=$num;
        $p["page_num"]=$page_num;
		$skill=new Skill_model();
		$data=$skill->showAll($page,$size);
		$this->assign('page',$p);
		$this->assign("data",$data);
		return $this->fetch();
	}
	//技术设计删除
	public function dele()
	{
		$skill_id=input("get.id");
		$skill=new Skill_model();
		$res=$skill->delOne($skill_id);
		if($res)
		{
			return $this->redirect("show");
		}
		else
		{
			return $this->error("删除失败！！！");
		}
	}
//	//ajax删除
//	public function deleete()
//	{
//		$skill_id=input("get.id");
//		$page=input("get.p");
//		$skill=new Skill_model();
//		$res=$skill->delOne($skill_id);
//		if($res)
//		{
//			
//		}
//	}
	//技术设计修改
	public function update()
	{
		if(request()->isGet())
		{
			$skill_id=input("get.id");
			$skill=new Skill_model();
			$data=$skill->showOne($skill_id);
//			print_r($data);die;
			$this->assign("data",$data);
			return $this->fetch();
		}
		else
		{
			$data=input("post.");
			$file = request()->file('skill_logo');
//			print_r();die;
			if(empty($file))
			{
				$skill_id=$data["skill_id"];
				$data["skill_logo"]=$data["logo"];
				unset($data["skill_id"]);
				unset($data["logo"]);
//				print_r($data);die;
				$skill=new Skill_model();
				$res=$skill->upOne($skill_id,$data);
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
					$data["skill_logo"]=$info->getSaveName();
				}
				else
				{			
					return $file->getError();
				}
				$skill_id=$data["skill_id"];
				unset($data["skill_id"]);
				unset($data["logo"]);
//				print_r($skill_id);die;
				$skill=new Skill_model();
//				print_r($data);die;
				$res=$skill->upOne($skill_id,$data);
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