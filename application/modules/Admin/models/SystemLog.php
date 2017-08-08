<?php

/**
 * 登录日志模型
 *
 * @author  moxiaobai
 * @since   2015-3-20
 */

class SystemLogModel extends BaseModel {

    private $_field ;
    public function __construct()
    {
        parent::__construct('www', 't_system_loginLog', 'll_id');
        $this->_field = 'll_id,ll_aid,ll_username,ll_realname,ll_login_ip,ll_login_time';
    }


    /**
     * 获取登陆日志列表
     *
     * @param array $where
     * @param array $pagination
     * @return mixed
     */
    public function getList($where=array(), $pagination=array()) {
        return $this->_setWhereSQL( $where )
            ->_setPaginationSQL($pagination)
            ->_db->select($this->_field)
            ->from($this->_table)
            ->order($this->_primary_key, 'DESC')
            ->fetchAll();
        if($rows === false) { return false;}


    }

    /**
     * 统计登陆日志数量
     *
     * @param $condition
     * @return mixed
     */
    public function countData($condition) {
        return $this->_setWhereSQL( $condition )->_db->select('COUNT(*)')->from($this->_table)->fetchValue();
    }

    /**
     * SQL分页查询
     */
    private function _setPaginationSQL( $pagination = array() ) {
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
     * @param array $condition
     * @return $this
     */
    private function _setWhereSQL ($condition = array()) {

        if (isset($condition['name']) AND $condition['name']) {
            $this->_db->where("ll_username", $condition['name']);
        }

        return $this;
    }


}