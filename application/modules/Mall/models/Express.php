<?php

/**
 * 物流信息管理
 *
 * @author: monyyip
 * @since : 2016/9/29 10:36
 */

class ExpressModel extends BaseModel {

    private $_field;
    public function __construct()
    {
        parent::__construct('www', 't_order_express', 'oe_id');
        $this->_field = 'oe_id,o_id,oe_contacts,oe_phone,oe_address,oe_express_company,oe_express_number,oe_addtime,oe_sipping_time';
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
    public function getInfo($oid) {
        return $this->_db->select($this->_field)->from($this->_table)->where('o_id', $oid)->fetchOne();
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
            return $this->_db->update($this->_table)->rows( $data )->where('o_id', $id)->execute();
        } else {
            return $this->_db->insert($this->_table)->rows( $data )->execute();
        }
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
        if (isset($condition['oid']) && strlen($condition['oid']) > 0) {
            $this->_db->where('o_id', intval($condition['oid']));
        }

        return $this;
    }
}