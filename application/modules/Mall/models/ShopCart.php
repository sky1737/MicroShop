<?php

/**
 * 购物车
 *
 * @auther monyyip
 * @since  2016-10-09
 */

class ShopCartModel extends BaseModel {

    private $_field;

    public function __construct(){
        $this->_field = 'sc_id,m_id,p_id,pp_ids,sc_number,sc_addtime';
        parent::__construct('www', 't_shopping_cart', 'sc_id');
    }

    /**
     * 查询所有商品
     */
    public function getList($where=array(), $pagination=array()) {
        $data = $this->_setWhereSQL($where)
            ->_setPaginationSQL($pagination)
            ->_db
            ->select($this->_field)
            ->from($this->_table)
            ->order($this->_primary_key,'ASC')
            ->fetchAll();

        return $data;
    }

    public function getInfo($id){
        return $this->_db->select($this->_field)->from($this->_table)->where($this->_primary_key, $id)->fetchOne();
    }

    public function getInfoByCond($where = array()){
        return $this->_setWhereSQL($where)->_db->select($this->_field)->from($this->_table)->fetchOne();
    }

    public function countData($where = array()){
        return $this->_setWhereSQL($where)->_db->select('count(1)')->from($this->_table)->fetchValue();
    }

    public function countCartData($ids = '', $mid = 0){
        return $this->_db->select('count(1)')->from($this->_table)->where('sc_id in(' . $ids . ')')->where('m_id', $mid)->fetchValue();
    }

    public function deleteCartData($ids = '', $mid = 0){
        return $this->_db->delete($this->_table)->where('sc_id in(' . $ids . ')')->where('m_id', $mid)->execute();
    }

    public function getCartData($ids = '', $mid = 0){
        return $this->_db->select($this->_field)->from($this->_table)->where('sc_id in(' . $ids . ')')->where('m_id', $mid)->fetchAll();
    }

    public function clearCart($mid){
        return $this->_db->delete($this->_table)->where('m_id', $mid)->execute();
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
        if (isset($condition['mid']) AND $condition['mid']) {
            $this->_db->where("m_id", $condition['mid']);
        }

        if (isset($condition['pid']) AND $condition['pid']) {
            $this->_db->where("p_id", $condition['pid']);
        }

        if (isset($condition['pp_ids']) AND $condition['pp_ids']) {
            $this->_db->where("pp_ids", $condition['pp_ids']);
        }

        return $this;
    }


    /**
     * 保存
     *
     * @param  $data
     * @param int $id
     * @return mixed
     */
    public function saveData($data, $id = 0){
        if ( $id > 0 ) {
            $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id);
        } else {
            $this->_db->insert($this->_table)->rows($data);
        }

        return $this->_db->execute();
    }
}