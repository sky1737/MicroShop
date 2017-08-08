<?php

/**
 * 折扣管理
 *
 * @author: monyyip
 * @since : 2016/9/27 16:20
 */

class DiscountModel extends BaseModel {

    private $_field;
    public function __construct(){
        $this->_field = 'pd_id,p_id,pd_title,pd_startTime,pd_endTime,pd_number,pd_addtime';
        parent::__construct('www', 't_product_discount', 'pd_id');
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
            ->order($this->_primary_key, 'DESC')
            ->fetchAll();

        if ( $data === FALSE ) return FALSE;
        return $data;
    }

    /**
     * 获取所有分类数据
     *
     * @access public
     * @return array
     */
    public function getCategory() {
        return $this->_db->select($this->_field)->where('pt_status', 1)->from($this->_table)->order($this->_primary_key)->fetchAll();
    }

    public function deleteCategory($where = array()){
        return $this->_setWhereSQL($where)->_db->delete($this->_table)->from($this->_table)->execute();
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

    public function getInfoByCond($where = array()){
        return $this->_setWhereSQL($where)->_db->select($this->_field)->from($this->_table)->fetchOne();
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

    public function deleteData($id){
        return $this->_db->delete($this->_table)->where($this->_primary_key, $id)->execute();
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
        if (isset($condition['title']) AND $condition['title']) {
            $this->_db->where('pd_title like "%' . $condition['title'] . '%"');
        }

        if (isset($condition['pid']) AND $condition['pid']) {
            $this->_db->where('p_id', $condition['pid']);
        }

        if (isset($condition['time']) AND $condition['time']) {
            $this->_db->where('pd_startTime >= "' . $condition['time'] . '"');
            $this->_db->where('pd_endTime <= "' . $condition['time'] . '"');
        }

        return $this;
    }


    /**
     * 查询所有分类对应ID
     */
    public function getAllCategory($status = 0){
        if($status > 0){
            $data =  $this->_db->select('pt_id','pt_name')->from($this->_table)->where('pt_status', $status)->fetchAll();
        }else{
            $data =  $this->_db->select('pt_id','pt_name')->from($this->_table)->fetchAll();
        }

        if(!$data){
            return $data;
        }

        $alldata = array();
        foreach($data as $v){
            $alldata[$v['pt_id']] = $v['pt_name'];
        }

        return $alldata;
    }
}