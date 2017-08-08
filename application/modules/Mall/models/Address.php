<?php

/**
 * 地址管理
 *
 * @author: lindexin
 * @since : 2016/1/29 10:36
 */

class AddressModel extends BaseModel {

    private $_field;
    public function __construct()
    {
        parent::__construct('www', 't_member_address', 'a_id');
        $this->_field = 'a_id,m_id,a_phone,a_realname,a_province,a_city,a_area,a_default,a_address,a_addtime';
    }

    /**
     * 通过用户 获得单条数据
     * @param $id 订单id
     * @return miexd
     */
    public function getUserInfo($id){
        return $this->_db->select($this->_field)->from($this->_table)->where('m_id', $id)->fetchOne();
    }

    public function getInfo($id){
        return $this->_db->select($this->_field)->from($this->_table)->where($this->_primary_key, $id)->fetchOne();
    }

    public function getDefaultInfo(){
        return $this->_db->select($this->_field)->from($this->_table)->where('m_id', M_ID)->where('a_default', 2)->fetchOne();
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
        if(isset($condition['mid']) && $condition['mid']){
            $this->_db->where('m_id', $condition['mid']);
        }

        return $this;
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

    public function deleteData($id){
        return $this->_db->delete($this->_table)->where($this->_primary_key, $id)->execute();
    }
}