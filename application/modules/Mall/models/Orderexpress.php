<?php

/**
 *
 *
 * @author: lindexin
 * @since : 2016/1/29 10:36
 */

class OrderexpressModel extends BaseModel {

    private $_filed;
    public function __construct()
    {
        parent::__construct('www', 't_order_express', 'oe_id');
        $this->_filed = 'oe_id,o_id,oe_contacts,oe_phone,oe_address,oe_express_company,oe_express_number,oe_addtime,oe_sipping_time,oe_sipping_time';
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
        $info = $this->_db->select('o_id,oe_contacts,oe_phone,oe_address,oe_express_company,oe_express_number,oe_sipping_time')->from($this->_table)->where("o_id IN({$ids})")->fetchAll();
        if ( $info === FALSE ) {return $data;}

        $info = Helper_Array::setIdsKey($info, 'o_id');

        foreach ( $data AS &$row ) {
            $row['oe_contacts']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['oe_contacts'] : '';
            $row['oe_phone']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['oe_phone'] : '';
            $row['oe_address']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['oe_address'] : '';
            $row['oe_express_company']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['oe_express_company'] : '';
            $row['oe_express_number']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['oe_express_number'] : '';
            $row['oe_sipping_time']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['oe_sipping_time'] : '';

        }
        return $data;
    }

}

