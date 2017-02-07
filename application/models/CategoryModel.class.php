<?php

/**
 * 商品分类模型
 * User: Levi
 * Date: 2017/2/7
 * Time: 15:01
 */
class CategoryModel extends Model
{
    //获取所有商品分类
    public function getCats()
    {
        $sql = "SELECT * FROM {$this->table}";
        $cats = $this->db->getAll($sql);
        return $this->tree($cats);
    }

    /**
     * 重新排序
     * @param array $arr [要排序的数组]
     * @param int $pid [父ID]
     * @return array [排好序的数组]
     */
    public function tree($arr, $pid = 0,$level=0,$res=array())
    {
        foreach ($arr as $v) {
            if ($v['parent_id'] == $pid) {
                //说明找到 先保存 然后递归查找
                $v["level"]=$level;
                $res[] = $v;
                $res=$this->tree($arr, $v['cat_id'],$level+1,$res);
            }
        }
        return $res;
    }

    /**
     * 得到自己以及子节点的cat_id
     * @param $cat_id
     * @return array
     */
    public function getSubIds($cat_id){
        $cats=$this->getCats();
        $cats=$this->tree($cats,$cat_id);
        foreach($cats as $v){
            $cat_ids[]=$v['cat_id'];
        }
        $cat_ids[]=$cat_id;

        return $cat_ids;
    }
}