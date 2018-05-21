<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Skill_model extends Model
{
	//技术设计添加一条数据
	public function addOne($data)
	{
		return Db::table("skill")->insert($data);
	}
	//技术设计分页展示数据
	public function showAll($page,$size)
	{
		return Db::table("skill")->order("skill_id","DESC")->page($page,$size)->select();
	}
	//技术设计删除一条数据
	public function delOne($skill_id)
	{
		return Db::table("skill")->where("skill_id",$skill_id)->delete();
	}
	//技术设计查询一条数据
	public function showOne($skill_id)
	{
		return Db::table("skill")->where("skill_id",$skill_id)->find();
	}
	//技术设计修改一条数据
	public function upOne($skill_id,$data)
	{
		return DB::table("skill")->where("skill_id",$skill_id)->update($data);
	}
}
