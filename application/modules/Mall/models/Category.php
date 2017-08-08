<?php

/**
 * 商家分类
 *
 * @author: monyyip
 * @since : 2016/4/07 16:20
 */

class CategoryModel extends BaseModel {
    private $_field;
    public function __construct(){
        $this->_field = 'pc_id,pc_pid,pc_img,pc_name,pc_alise,pc_order,pc_status';
        parent::__construct('www', 't_product_category', 'pc_id');
    }

    /**
     * 获取数据列表
     *
     * @param array $where       搜索条件
     * @param array $pagination  分页信息
     */
    public function getList($where=array(), $pagination = array()) {
        $data = $this->_setWhereSQL($where)
            ->_setPaginationSQL($pagination)
            ->_db->select($this->_field)
            ->from($this->_table)
            ->order('pc_order', 'DESC')
            ->order($this->_primary_key, 'DESC')
            ->fetchAll();

        if ( $data === FALSE ) return FALSE;
        return $this->mergData($data);
    }

    /**
     * 获取所有分类数据
     *
     * @access public
     * @return array
     */
    public function getCategory() {
        return $this->_db->select('pc_id', 'pc_img','pc_pid', 'pc_name', 'pc_order')->where('pc_status', 1)->from($this->_table)->order('pc_order')->order('pc_id')->fetchAll();
    }

    public function deleteCategory($where = array()){
        return $this->_setWhereSQL($where)->_db->delete($this->_table)->from($this->_table)->execute();
    }

    /**
     * 整合信息
     *
     * @param $data
     * @return mixed
     */
    public function mergData($data, $key = 'pc_pid') {
        if ( ! is_array( $data ) )
            return $data;


        $ids = Helper_Array::setIds($data, $key, TRUE);
        if ( ! $ids) {return $data;}
           //公司信息
        $info = $this->_db->select('pc_id', 'pc_name')->from($this->_table)->where("pc_id IN({$ids})")->fetchAll();
        if ( $info === FALSE ) {return $data;}

        $info = Helper_Array::setIdsKey($info, 'pc_id');

        foreach ( $data AS &$row ) {
            $row['pc_pname']   = isset($info[ $row['pc_pid'] ]) ? $info[ $row['pc_pid'] ]['pc_name'] : '';
        }

        return $data;
    }


    /**
     * 统计数量
     *
     * @param array $where
     */
    public function countData($where=array()) {
        return $this->_setWhereSQL($where)->_db->select('COUNT(*)')->from($this->_table)->fetchValue();
    }

    /**
     * @param $id
     */
    public function getInfo($id) {
        return $this->_db->select($this->_field)->from($this->_table)->where($this->_primary_key, $id)->fetchOne();
    }

    /**
     * 保存数据
     *
     * @param array $data
     * @param int   $id
     * @return mixed
     */
    public function saveData($data, $id=0) {
        if ( $id > 0 ) {
            return $this->_db->update($this->_table)->rows( $data )->where($this->_primary_key, $id)->execute();
        } else {
            return $this->_db->insert($this->_table)->rows( $data )->execute();
        }
    }

    /**
     * 改变状态
     *
     * @param $id
     * @param array $data 修改数据
     * @return mixed
     */
    public function changeData($id, $data) {
        return $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id)->execute();
    }


    /**
     * 判断存在数据
     *
     * @param array $where
     * @return mixed
     */
    public function isExistData($where = array()) {
        return $this->_setWhereSQL( $where )->_db->select($this->_primary_key)->from($this->_table)->fetchValue();
    }

    /**
     * SQL分页查询
     */
    protected  function _setPaginationSQL( $pagination = array() ) {
        if ( isset($pagination['page']) AND isset($pagination['pagesize']) ) {
            $page      = isset( $pagination['page'] ) ? intval($pagination['page']) : 1;
            $pagesize  = isset( $pagination['pagesize']  ) ? intval($pagination['pagesize'])  : 10;
            $this->_db->page($page, $pagesize);
        } elseif ( isset($pagination['limit']) ) {
            $this->_db->limit( intval($pagination['limit']) );
        }
        return $this;
    }

    /**
     * SQL Where条件
     *
     * @param array $condition
     * @return $this
     */
    private function _setWhereSQL ($condition = array()) {
        if (isset($condition['pid']) && strlen($condition['pid']) > 0) {
            $this->_db->where('pc_pid', intval($condition['pid']));
        }

        if (isset($condition['pc_id']) AND $condition['pc_id']) {
            $this->_db->where('pc_id', $condition['pc_id']);
        }

        if (isset($condition['selfId']) AND $condition['selfId']) {
            $this->_db->where('pc_id !=' . $condition['selfId'] );
        }

        if (isset($condition['alise']) AND $condition['alise']) {
            $this->_db->where('pc_alise', $condition['alise']);
        }

        if (isset($condition['name']) AND $condition['name']) {
            $this->_db->where('pc_name like "%' . $condition['name'] . '%"');
        }

        if (isset($condition['status']) AND $condition['status']) {
            $this->_db->where('pc_status', $condition['status']);
        }

        return $this;
    }


    /**
     * 获取所有分类数据树形结构
     *
     * @access public
     * @return array
     */
    public function getCategoryTree( $category = FALSE, $f_id = 0, $tree_selected='', $source =2) {
        //初始化category为按照fid分组
        if ( $category === FALSE ) {
            $temp  = $this->getCategory($source);
            $category = array();
            if($temp) {
                foreach( $temp AS $row ) {
                    $category[$row['pc_pid']][] = $row;
                }
            }
        }

        //初始化tree结构,并且没有顶级目录，自动返回错误
        $tree = array();
        if ( ! is_array($category[$f_id]) ) return FALSE;

        foreach ( $category[$f_id] AS $childs ) {
            $pc_id = $childs['pc_id'];
            $tree[$pc_id] = $childs;

            if ( isset( $category[$pc_id] ) AND is_array( $category[$pc_id] ) ) {
                $tree[$pc_id]['d_childs'] = $this->getCategoryTree($category, $pc_id);
                unset($category[$pc_id]);
            }
        }

        return $tree;
    }

    /**
     * 获取所有分类数据树形Select Options字符串
     *
     * @access public
     * @return array
     */
    public function getCategoryTreeOptions($tree, $tree_selected='', $string='', $level=0, $tag = '+') {
        if ( ! $string )
            $string = '<option value="">请选择分类</option>';
        if($tree) {
            foreach ($tree AS $row) {
                $selected  = ($row['pc_id'] == $tree_selected) ? ' selected' : NULL;
                $string   .= "<option value=\"{$row['pc_id']}\"{$selected}>".str_repeat("&#160;&#160;", $level).$tag.$row['pc_name']."</option>";
                if ( isset($row['d_childs']) AND is_array($row['d_childs']) AND !empty($row['d_childs']) ) {
                    $level++;
                    $string = $this->getCategoryTreeOptions($row['d_childs'], $tree_selected, $string, $level, '&nbsp;&nbsp;&nbsp;&nbsp;');
                    $level--;
                }
            }
        }
        return $string;
    }

    /**
     * 查询所有分类对应ID
     */
    public function getAllCategory($pid = 0){
        $where = array();
        if($pid > 0){
            $where['pid'] = $pid;
        }

        $data =  $this->_setWhereSQL($where)->_db->select('pc_name','pc_id')->from('t_product_category')->fetchAll();
        if(!$data){
            return $data;
        }

        $alldata = array();
        foreach($data as $v){
            $alldata[$v['pc_id']] = $v['pc_name'];
        }

        return $alldata;
    }

}