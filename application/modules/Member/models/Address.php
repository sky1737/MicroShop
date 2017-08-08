<?php

/**
 * 地址管理
 *
 * @author: lindexin
 * @since : 2016/9/27
 */

class AddressModel extends BaseModel {

    private $_field;
    public function __construct()
    {
        parent::__construct('www', 't_member_address', 'a_id');
        $this->_field = 'a_id,m_id,a_phone,a_realname,a_province,a_city,a_area,a_default,a_address,a_addtime';
    }

    /**
     * 获取数据列表
     *
     * @param array $where       搜索条件
     * @param array $pagination  分页信息
     * @return miexd
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
     * 统计数量
     *
     * @param array $where
     */
    public function countData($where=array()) {
        return $this->_setWhereSQL($where)->_db->select('COUNT(*)')->from($this->_table)->fetchValue();
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
        if (isset($condition['name']) AND $condition['name']) {
            $this->_db->where("a_realname like '%{$condition['name']}%'");
        }

        if (isset($condition['phone']) AND $condition['phone']) {
            $this->_db->where('a_phone', $condition['phone']);
        }

        if (isset($condition['status']) AND $condition['status']) {
            $this->_db->where('a_default', $condition['status']);
        }

        if (isset($condition['id']) AND $condition['id']) {
            $this->_db->where('m_id', $condition['id']);
        }

        return $this;
    }

}