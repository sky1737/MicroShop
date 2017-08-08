<?php

/**
 *
 *
 * @author: 订单列表
 * @since : 2016/1/29 10:36
 */

class OrderlistModel extends BaseModel {

    private $_filed;
    public function __construct()
    {
        parent::__construct('www', 't_order_list', 'ol_id');
        $this->_filed = 'ol_id,o_id,p_id,p_title,pp_ids,pp_names,ol_num';
    }

    /*
     * 通过订单ID获得所有信息
     */
    public function getAllList($id){
        $data = $this->_db->select($this->_filed)->from($this->_table)->where('o_id',$id)->fetchAll();
        if($data ===FALSE) return $data;
        return $data;
    }

    /**
     * 整合信息
     *
     * @param $data
     * @return mixed
     */
    public function mergData($data,$key='o_id') {
        if ( ! is_array( $data ) )
            return $data;

        $ids = Helper_Array::setIds($data, $key, TRUE);
        if ( ! $ids) {return $data;}

        //订单信息
        $info = $this->_db->select($this->_filed)->from($this->_table)->where("o_id IN({$ids})")->fetchAll();
        if ( $info === FALSE ) {return $data;}

        $info = Helper_Array::setIdsKey($info, 'o_id');

        foreach ( $data AS &$row ) {
            $row['ol_id']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['ol_id'] : '';
            $row['o_id']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['o_id'] : '';
            $row['p_id']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['p_id'] : '';
            $row['p_title']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['p_title'] : '';
            $row['pp_ids']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['pp_ids'] : '';
            $row['pp_names']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['pp_names'] : '';
            $row['ol_num']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['ol_num'] : '';

        }
        return $data;
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
}

