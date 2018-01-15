<?php
/**
 * @name PHPTree
 * @author crazymus < QQ:291445576 >
 * @des PHP生成树形结构,无限多级分类
 * @version 1.2.0
 * @Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * @updated 2015-08-26
 */
namespace  common\helps;
use yii\helpers\ArrayHelper;

class Tree{


	
    protected static $config = array(
        /* 主键 */
        'primary_key' 	=> 'id',
        /* 父键 */
        'parent_key'  	=> 'pid',
        /* 展开属性 */
        'expanded_key'  => 'expanded',
        /* 叶子节点属性 */
        'leaf_key'      => 'leaf',
        /* 孩子节点属性 */
        'children_key'  => 'children',
        /* 是否展开子节点 */
        'expanded'    	=> false
    );

    /* 结果集 */
    protected static $result = array();
    /* 转树字段 */
    protected static $fieldName = '';

    /* 层次暂存 */
    protected static $level = array();

	
	
    /**
     * @name 生成树形结构
     * @param array 二维数组
     * @return mixed 多维数组
     */
    public static function makeTree($data,$options=array() ){
        $dataset = self::buildData($data,$options);
        $r = self::makeTreeCore(0,$dataset,'normal');
        return $r;
    }

    /* 生成线性结构, 便于HTML输出, 参数同上 */
    public static function makeTreeForHtml($data,$options=array()){

        $dataset = self::buildData($data,$options);
        $r = self::makeTreeCore(0,$dataset,'linear');
        return $r;
    }

    /* 格式化数据, 私有方法 */
    private static function buildData($data,$options){
        $config = array_merge(self::$config,$options);
        self::$config = $config;
        extract($config);
        $r = array();
        foreach($data as $item){
            $id = $item[$primary_key];
            $parent_id = $item[$parent_key];
            $r[$parent_id][$id] = $item;
        }
        return $r;
    }
	
	
    /**
     * 获取树整理
     * @param string $id
     * @return array
     *
     */
    public static function getTree($all,$first=array(),$fieldName='name')
    {
		self::$fieldName = $fieldName;
        $dataList = array();
        if ($all) {
            //生成线性结构, 便于HTML输出
            $dataList = self::makeTreeForHtml($all);
			
            $dataList = array_map(function ($item) {
                $nbsp = '';
                for ($i = 1; $i <= $item['level']; $i++) {
                    $nbsp .= '─';//制表符
                }
                $nbsp .= '╊';//制表符
                $item[self::$fieldName] = $nbsp . $item[self::$fieldName];
                return $item;
            }, $dataList);
            $dataList = ArrayHelper::map($dataList, 'id', self::$fieldName);
        }
		$dataList = $first + $dataList;
        return $dataList;
    }
	
	
	
    /* 生成树核心, 私有方法  */
    private static function makeTreeCore($index,$data,$type='linear')
    {
        extract(self::$config);
        foreach($data[$index] as $id=>$item)
        {
            if($type=='normal'){
                if(isset($data[$id]))
                {
                    $item[$expanded_key]= self::$config['expanded'];
                    $item[$children_key]= self::makeTreeCore($id,$data,$type);
                }
                else
                {
                    $item[$leaf_key]= true;
                }
                $r[] = $item;
            }else if($type=='linear'){
                $parent_id = $item[$parent_key];
                self::$level[$id] = $index==0?0:self::$level[$parent_id]+1;
                $item['level'] = self::$level[$id];
                self::$result[] = $item;
                if(isset($data[$id])){
                    self::makeTreeCore($id,$data,$type);
                }

                $r = self::$result;
            }
        }
        return $r;
    }
	
	
	//第二种方法生成树
	public static function getTreeTow($list,$pk='id',$pid = 'pid',$root=0,$child = '_child',$prefix="-",$level=0,$start_str="|")
	{

			$tree = self::ListToTree($list,$pk,$pid,$root,$child);
			return  self::treetoary($tree,array(),$pk,$child,$prefix,$level,$start_str);
			
	}
	
	public static function ListToTree($list, $pk='id',$pid = 'pid',$root=0,$child = '_child')
	{
		// 创建Tree
		$tree = array();
		if(is_array($list)) {
			// 创建基于主键的数组引用
			$refer = array();
			foreach ($list as $key => $data) {
				$refer[$data[$pk]] =& $list[$key];
			}
			foreach ($list as $key => $data) {
				// 判断是否存在parent
				$parentId = $data[$pid];
				if ($root == $parentId) {
					$tree[] =& $list[$key];
				}else{
					if (isset($refer[$parentId])) {
						$parent =& $refer[$parentId];
						$parent[$child][] =& $list[$key];
					}
				}
			}
		}
		return $tree;
	}
	//树整理
	public static function treetoary($list,$CategoryTree=array(),$pk='id',$child = '_child',$prefix="&nbsp;",$level=0,$start_str="|") {
	  
	  $tree=$CategoryTree;
	  foreach($list as $key=>$val)
	  {
		$tmp_str=str_repeat($prefix,$level*2);
		if($level>0) {
			$tmp_str=$start_str.$tmp_str;
		}
		$val['level'] = $level;
		$val['name']  = $tmp_str.$val['name'];
		if(!array_key_exists($child,$val)) {
			$tree[$val[$pk]] = $val;
		   //array_push($tree,$val);
		}else{
			$tmp_ary = $val[$child];
			unset($val[$child]);
			$tree[$val[$pk]] = $val;
		   //array_push($tree,$val);
		   $tree=self::treetoary($tmp_ary,$tree,$pk,$child,$prefix,$level+1,$start_str);
		}
	  }
	  return $tree;
	}
	
	
}


