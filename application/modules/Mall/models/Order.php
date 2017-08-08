<?php

/**
 * 订单管理模块
 *
 * @author: lindexin
 * @since : 2016/08/15
 */

class OrderModel extends BaseModel {

    private $_field;
    public function __construct(){
        parent::__construct('www', 't_order', 'o_id');
        $this->_field = 'o_id,o_order_no,m_id,o_price,o_order_amount,o_payment_amount,o_pay_status,o_order_status,o_addtime,o_paytime,o_updatetime,o_memo,o_refund_status,o_express_fee';
    }

    /**
     * 获取数据列表
     *
     * @param array $where       搜索条件
     * @param array $pagination  分页信息
     * @return mixed
     */
    public function getList($where=array(), $pagination = array(),$filed='') {
        $data = $this->_setWhereSQL($where)
            ->_setPaginationSQL($pagination)
            ->_db->select(isset($filed) ? $this->_field : $filed)
            ->from($this->_table)
            ->order('o_id', 'DESC')
            ->fetchAll();

        if ( !$data) {
            return $data;
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

    public function deleteOrder($where = array()){
        return $this->_setWhereSQL($where)->_db->delete($this->_table)->from($this->_table)->execute();
    }

    /**
     * 支付成功后,处理订单
     *
     * @param string $orderNo 订单号
     * @return bool
     */
    public function dealOrder($orderNo) {
        $orderInfo = $this->getOrderInfoByOrderNo($orderNo);
        if(!$orderInfo) {
            return false;
        }

        //判断订单是否处理
        if($orderInfo['o_pay_status'] == 3) {
            return false;
        }

        //订单ID
        $oid = $orderInfo['o_id'];

        //更新订单状态
        $this->updateOrderPayStatus($oid, 3);

        //更新订单进度
        $this->updateOrderProgress($oid, '成功支付订单');

        // 获得商品列表
        $orderList = $this->loadModel('OrderList', array(), 'Mall')->getAllList($oid);
        if($orderList){
            foreach($orderList as $val){
                //增加产品销量
                $this->loadModel('Product', array(), 'Mall')->updateSales($val['p_id'], $val['ol_num']);
                //增加套餐销量
                if($val['pp_ids'] != '') {
                    $this->loadModel('ProductProfile', array(), 'Mall')->updateSales($val['pp_ids'], $val['ol_num']);
                }
            }
        }

        return $orderInfo;
    }

    /**
     * 取消订单
     *
     * @param integer $oid   订单ID
     * @return bool
     */
    public function cancleOrder($oid) {
        //更新订单进度
        $this->updateOrderProgress($oid, '用户取消订单');

        //获取订单信息
        $orderInfo = $this->getOrderInfoByOrderNo($oid,2);
        if(!$orderInfo) {
            return false;
        }

        //判断订单是否处理
        if($orderInfo['o_pay_status'] == 2) {
            return false;
        }

        // 获得商品列表
        $orderList = $this->loadModel('OrderList', array(), 'Mall')->getAllList($oid);
        if($orderList){
            foreach($orderList as $val){
                //增加产品销量
                $this->loadModel('Product', array(), 'Mall')->updateStock($val['p_id'], $val['ol_num']);
                //增加套餐销量
                if($val['pp_ids'] != '') {
                    $this->loadModel('ProductProfile', array(), 'Mall')->updateStock($val['pp_ids'], $val['ol_num']);
                }
            }
        }

        return true;
    }

    /**
     * 确认订单
     *
     * @param   integer $oid 订单ID
     * @return boolean
     */
    public function completeOrder($oid) {
        //更新订单进度
        $this->updateOrderProgress($oid, '用户确认订单');

        //获取订单信息
        $orderInfo = $this->getOrderInfoByOrderNo($oid,2);
        if(!$orderInfo) {
            return false;
        }

        //判断订单是否处理
        if($orderInfo['o_order_status'] == 3) {
            return false;
        }

        return true;
    }

    /**
     * 根据订单号获取订单信息
     *
     * @param $orderNo   订单号/订单ID
     * @param $type      类型  1订单号，2订单ID
     * @param string $field
     * @return mixed
     */
    public function getOrderInfoByOrderNo($orderNo, $type=1, $field = 'o_id,o_order_no,o_pay_status,o_order_status,m_id,p_id,pp_ids,o_number,o_payment_amount') {
        if($type == 1) {
            $this->_db->where('o_order_no', $orderNo);
        } else {
            $this->_db->where('o_id', $orderNo);
        }

        return $this->_db->select($field)->from('t_order')->fetchOne();
    }

    /**
     * 更新订单确认状态
     *
     * @param $oid     订单ID
     * @param $status  状态    1未发货，2已经发货,3确认收货
     * @return mixed
     */
    public function updateOrderConfirmStatus($oid, $status) {
        $rows = array(
            'o_order_status' => $status,
            'o_updatetime'   => date('Y-m-d H:i:s')
        );

        return $this->_db->update('t_order')->where('o_id', $oid)->rows($rows)->execute();
    }

    /**
     * 更新订单支付状态
     *
     * @param $oid      订单ID
     * @param $status   支付状态   1未支付，2取消订单，3已经支付
     * @return mixed
     */
    public function updateOrderPayStatus($oid, $status) {
        $rows = array(
            'o_pay_status' => $status,
            'o_updatetime' => date('Y-m-d H:i:s')
        );

        return $this->_db->update('t_order')->where('o_id', $oid)->rows($rows)->execute();
    }

    /**
     * 添加订单进度
     *
     * @param $oid    订单ID
     * @param $memo   备注
     * @return mixed
     */
    public function updateOrderProgress($oid, $memo) {
        $rows = array(
            'o_id'       => $oid,
            'op_memo'    => $memo,
            'op_addtime' => date('Y-m-d H:i:s')
        );

        return $this->_db->insert('t_order_progress')->rows($rows)->execute();
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
     * @param array $where
     * @return $this
     */
    private function _setWhereSQL ($where = array()) {
        //订单类型
        if (isset($where['showType']) && $where['showType']==1) {
            $this->_db->where('o_pay_status = 1 and o_order_status=1 and o_refund_status=1');//待付款
        }

        if (isset($where['showType']) && $where['showType']==2) {
            $this->_db->where('o_pay_status = 3 and o_order_status=1 and o_refund_status=1');//待发货
        }
        if (isset($where['showType']) && $where['showType']==3) {
            $this->_db->where('o_pay_status = 3 and o_order_status=2 and o_refund_status=1');//待收货

        }
        if (isset($where['showType']) && $where['showType']==4) {
            $this->_db->where('o_pay_status = 3 and o_order_status=3 and o_refund_status=1');//已收货
        }
        if (isset($where['showType']) && $where['showType']==5) {
            $this->_db->where('o_pay_status = 3  and o_refund_status=2');//退款中
        }


        if (isset($where['orderSn']) AND $where['orderSn']) {
            $this->_db->where("o_order_no", $where['orderSn']);
        }

        if (isset($where['title']) AND $where['title']) {
            $this->_db->where("p_title like '%{$where['title']}%'");
        }

        if (isset($where['orderSn']) AND $where['orderSn']) {
            $this->_db->where("o_order_no", $where['orderSn']);
        }

        if (isset($where['psid']) AND $where['psid']) {
            $this->_db->where("o_pay_status", $where['psid']);
        }

        if (isset($where['osid']) AND $where['osid']) {
            $this->_db->where("o_order_status", $where['osid']);
        }

        if (isset($where['rsid']) AND $where['rsid']) {
            $this->_db->where("o_refund_status", $where['rsid']);
        }

        if (isset($where['endTime']) AND $where['endTime']) {
            $this->_db->where("o_updatetime  <= '" . $where['endTime'] . "'");
        }

        if(isset($where['startTime']) AND $where['startTime']) {
            $this->_db->where("o_updatetime  >= '" . $where['startTime'] . "'");
        }


        return $this;
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
        $info = $this->_db->select('o_id', 'o_pay_status','o_payTime','o_price','o_order_sn','p_title')->from($this->_table)->where("o_id IN({$ids})")->fetchAll();
        if ( $info === FALSE ) {return $data;}

        $info = Helper_Array::setIdsKey($info, 'o_id');

        foreach ( $data AS &$row ) {
            $row['o_pay_status']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['o_pay_status'] : '';
            $row['o_payTime']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['o_payTime'] : '';
            $row['o_price']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['o_price'] : '';
            $row['o_order_sn']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['o_order_sn'] : '';
            $row['p_title']   = isset($info[ $row[$key] ]) ? $info[ $row[$key] ]['p_title'] : '';
        }
        return $data;
    }

    /**
     * 通过id 获得单条数据
     * @param $id 订单id
     * @return miexd
     */
    public function getInfo($id){
        return $this->_db->select($this->_field)->from($this->_table)->where('o_id',$id)->fetchOne();
    }

    public function getInfoByOrderNo($orderNo = ''){
        return $this->_db->select($this->_field)->from($this->_table)->where('o_order_no', $orderNo)->fetchOne();
    }

    /**
     * 保存数据
     *
     * @param array $data
     * @param int   $id
     * @return mixed
     */
    public function saveData($data, $id=0) {
        if($id){
            return $this->_db->update($this->_table)->rows($data)->where($this->_primary_key, $id)->execute();
        }else{
            return $this->_db->insert($this->_table)->rows($data)->execute();
        }
    }

    /**
     * 统计当天下单数
     * @return mixed
     */
    public function countOrder() {
        return $this->_db->select('COUNT(*)')
                ->from($this->_table)
                ->where('o_pay_status', 3)
                ->where("date(o_updatetime) = curdate()")
                ->fetchValue();
    }

    /**
     * 统计当天销售金额
     * @return mixed
     */
    public function countSalesMoney() {
        return $this->_db->select('sum(o_payment_amount)')
            ->from($this->_table)
            ->where('o_pay_status', 3)
            ->where("date(o_updatetime) = curdate()")
            ->fetchValue();
    }
}