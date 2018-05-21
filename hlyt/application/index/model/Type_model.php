<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Type_model extends Model
{
	//公司业务类型添加一条数据
	public function addOne($data)
	{
		return Db::table("type")->insert($data);
	}
	//公司业务类型分页展示数据
	public function showAll($page,$size)
	{
		return Db::table("type")->order("type_id","DESC")->page($page,$size)->select();
	}
	//公司业务类型删除一条数据
	public function delOne($type_id)
	{
		return Db::table("type")->where("type_id",$type_id)->delete();
	}
	//公司业务类型查询一条数据
	public function showOne($type_id)
	{
		return Db::table("type")->where("type_id",$type_id)->find();
	}
	//公司业务类型修改一条数据
	public function upOne($type_id,$data)
	{
		return DB::table("type")->where("type_id",$type_id)->update($data);
	}
}
