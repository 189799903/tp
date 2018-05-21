<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Product_model extends Model
{
	//产品类型添加一条数据
	public function addOne($data)
	{
		return Db::table("product")->insert($data);
	}
	//产品类型分页展示数据
	public function showAll($page,$size)
	{
		return Db::table("product")->order("p_id","DESC")->page($page,$size)->select();
	}
	//产品类型删除一条数据
	public function delOne($product_id)
	{
		return Db::table("product")->where("p_id",$product_id)->delete();
	}
	//产品类型查询一条数据
	public function showOne($p_id)
	{
		return Db::table("product")->where("p_id",$p_id)->find();
	}
	//产品类型修改一条数据
	public function upOne($p_id,$data)
	{
		return DB::table("product")->where("p_id",$p_id)->update($data);
	}
}
