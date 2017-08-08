<?php

/**
 * 分类管理
 *
 * @author: lindexin
 * @since : 2016/07/06
 */

class ProductController extends BaseController
{

    //初始化
    public function init()
    {
        $this->isAjaxRequest();
        $this->isFrontLogin();
        Yaf_Dispatcher::getInstance()->disableView();
    }


    //更改状态
    public function statusAction($id, $status) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }

        $status  = ($status == 1) ? 2: 1;
        $data     = array('p_status'=>$status);
        $result   = ProductModel::getInstance()->saveData($data, $id);
        if($result) {
            Helper_Json::formJson('操作成功', 'y');
        } else {
            Helper_Json::formJson('操作失败');
        }
    }

    public function buyAction(){
        $key = 'SESSION_TIME' . M_ID;
        $session = isset($_SESSION[$key]) ? $_SESSION[$key] : 0;
        if(time() - $session < 1){
            Helper_Json::formJson('支付中响应中。。。', 'n');
        }

        $_SESSION[$key] = time();
        $pid = isset($_POST['pid']) ? intval($_POST['pid']) : 0;
        $ppids = isset($_POST['ppids']) ? Helper_Filter::format($_POST['ppids']) : '';
        $num = isset($_POST['num']) ? intval($_POST['num']) : 1;
        $addr = isset($_POST['addr']) ? intval($_POST['addr']) : 0;
        $memo = isset($_POST['memo']) ? Helper_Filter::format($_POST['memo']) : '';
        // 判断商品是否存在
        $productInfo = $this->loadModel('Product', array(), 'Mall')->getProductById($pid);
        if(empty($productInfo)){
            Helper_Json::formJson('商品信息错误');
        }

        if($num <= 0){
            Helper_Json::formJson('请选择购买数量');
        }

        $price = 0;
        $titles = array();
        if($ppids){
            $ppidsArr = explode(',', $ppids);
            if(empty($ppidsArr)){
                Helper_Json::formJson('请选择规格');
            }


            foreach($ppidsArr as $val){
                $res = $this->loadModel('ProductProfile', array(), 'Mall')->getInfo($val);
                if(empty($res)){
                    Helper_Json::formJson('套餐信息错误');
                }

                if($res['pp_stock'] < $num){
                    Helper_Json::formJson('库存不够');
                }

                $titles[] = $res['pp_name'];
                $price += $res['pp_price'];
            }
        }else{
            if($productInfo['p_stock'] < $num){
                Helper_Json::formJson('库存不够');
            }

            $price = $productInfo['p_price'];
        }


        // 获得地址
        $addr = $this->loadModel('Address', array(), 'Mall')->getInfo($addr);
        if(empty($addr)){
            Helper_Json::formJson('未选择地址', 'n');
        }

        // 计算总价
        $totalPrice = $price * $num;
        $orderNo = date('YmdHis') . Helper_Code::getActiveCode(4);
        $paymentModel = $this->loadModel('Payment', array(), 'Pay');
        $params = $paymentModel->getJsApiParameters($orderNo, '可米支付', $totalPrice);
        if(empty($params)){
            Helper_Json::formJson('订单生成失败', 'n');
        }

        $params = json_decode($params, TRUE);

        $data = array(
            'o_order_no'       => $orderNo,
            'm_id'             => M_ID,
            'o_price'          => $price,
            'o_order_amount'   => $totalPrice,
            'o_payment_amount' => $totalPrice,
            'o_addtime'        => date('Y-m-d H:i:s'),
            'o_memo'           => $memo
        );

        $orderModel = $this->loadModel('Order', array(), 'Mall');
        $o_id       = $orderModel->saveData($data);
        if($o_id){
            // 订单附带表
            $dataList = array(
                'o_id'     => $o_id,
                'p_id'     => $productInfo['p_id'],
                'p_title'  => $productInfo['p_title'],
                'pp_ids'   => $ppids,
                'pp_names' => implode(',', $titles),
                'ol_num'   => $num
            );

            $this->loadModel('OrderList', array(), 'Mall')->saveData($dataList);

            //写入订单进度
            $orderModel->updateOrderProgress($o_id, '创建订单');
            // 收货地址
            $expressData = array(
                'o_id'        => $o_id,
                'oe_contacts' => $addr['a_realname'],
                'oe_phone'    => $addr['a_phone'],
                'oe_address'  => $addr['a_province'] . $addr['a_city'] . $addr['a_area'] . $addr['a_address'],
                'oe_addtime'  => date('Y-m-d H:i:s')
            );

            $this->loadModel('Express', array(), 'Mall')->saveData($expressData);
            // 扣库存
            if ($ppids) {
                $ret = $this->loadModel('ProductProfile', array(), 'Mall')->updateStock($ppids, $num);
            } else {
                $ret = $this->loadModel('Product', array(), 'Mall')->updateStock($pid, $num);
            }

            if(!$ret){
                Helper_Json::formJson('扣库存失败');
            }

            Helper_Json::formJson(array('params' => $params, 'orderNo' => $orderNo, 'id' => $o_id), 'y');
        }else{
            Helper_Json::formJson('订单创建失败');
        }
    }

    public function repayAction(){
        $oid = isset($_POST['oid']) ? intval($_POST['oid']) : 0;
        $orderInfo = $this->loadModel('Order', array(), 'Mall')->getInfo($oid);
        if(empty($orderInfo)){
            Helper_Json::formJson('订单信息错误');
        }

        if($orderInfo['o_pay_status'] != 1){
            Helper_Json::formJson('只有待付款订单可以重新支付');
        }

        $paymentModel = $this->loadModel('Payment', array(), 'Pay');
        $params = $paymentModel->getJsApiParameters($orderInfo['o_order_no'], '可米支付', $orderInfo['o_payment_amount']);
        if(empty($params)){
            Helper_Json::formJson('订单生成失败', 'n');
        }

        Helper_Json::formJson(array('params' => $params, 'orderNo' => $orderInfo['o_order_no'], 'id' => $orderInfo['o_id']), 'y');
    }

    public function buyCartAction(){
        $key = 'SESSION_TIME' . M_ID;
        $session = isset($_SESSION[$key]) ? $_SESSION[$key] : 0;
        if(time() - $session < 1){
            Helper_Json::formJson('支付中响应中。。。', 'n');
        }

        $_SESSION[$key] = time();
        $scids = isset($_POST['scids']) ? Helper_Filter::format($_POST['scids']) : '';
        $addr = isset($_POST['addr']) ? intval($_POST['addr']) : 0;
        $memo = isset($_POST['memo']) ? Helper_Filter::format($_POST['memo']) : '';
        if(empty($scids)){
            Helper_Json::formJson('参数异常', 'n');
        }

        $addrInfo = $this->loadModel('Address', array(), 'Mall')->getInfo($addr);
        if(empty($addrInfo)){
            // 获得默认地址
            $addrInfo = $this->loadModel('Address', array(), 'Mall')->getDefaultInfo();
        }

        if(!empty($addrInfo) && $addrInfo['m_id'] != M_ID){
            Helper_Json::formJson('联系地址异常', 'n');
        }

        $cartList = $this->loadModel('ShopCart', array(), 'Mall')->getCartData($scids, M_ID);
        if(empty($cartList)){
            Helper_Json::formJson('购物车异常', 'n');
        }

        $totalPrice = 0;
        foreach($cartList as &$val){
            $pid = $val['p_id'];
            $ppids = $val['pp_ids'];
            $productInfo = $this->loadModel('Product', array(), 'Mall')->getProductById($pid);
            if(empty($productInfo)){
                $this->redirect('/mall/index/index');
            }

            $val['productInfo'] = $productInfo;
            $price = 0;
            $ppname = array();
            if($ppids){
                $ppidsArr = explode(',', $ppids);
                foreach($ppidsArr as $val){
                    $res = $this->loadModel('ProductProfile', array(), 'Mall')->getInfo($val);
                    if(empty($res)){
                        $this->redirect('/mall/index/index');
                    }else{
                        if($res['pp_stock'] < $val['sc_number']){
                            Helper_Json::formJson('库存不够');
                        }

                        $ppname[] = $res['pp_name'];
                        $price += $res['pp_price'];
                    }
                }
            }else{
                if($productInfo['p_stock'] < $val['sc_number']){
                    Helper_Json::formJson('库存不够');
                }

                $price = $productInfo['p_price'];
            }

            $val['price'] = $price;
            $val['ppname'] = implode(',', $ppname);
            $totalPrice += $price;
        }

        $orderNo = date('YmdHis') . Helper_Code::getActiveCode(4);
        $paymentModel = $this->loadModel('Payment', array(), 'Pay');
        $params = $paymentModel->getJsApiParameters($orderNo, '可米支付', $totalPrice);
        if(empty($params)){
            Helper_Json::formJson('订单生成失败', 'n');
        }

        $params = json_decode($params, TRUE);
        $data = array(
            'o_order_no'       => $orderNo,
            'm_id'             => M_ID,
            'o_price'          => $totalPrice,
            'o_order_amount'   => $totalPrice,
            'o_payment_amount' => $totalPrice,
            'o_addtime'        => date('Y-m-d H:i:s'),
            'o_memo'           => $memo
        );

        $orderModel = $this->loadModel('Order', array(), 'Mall');
        $o_id       = $orderModel->saveData($data);
        if($o_id){
            // 清空购物车
            $this->loadModel('ShopCart', array(), 'Mall')->clearCart(M_ID);

            // 订单附带表
            foreach($cartList as $val){
                $dataList = array(
                    'o_id'     => $o_id,
                    'p_id'     => $val['p_id'],
                    'p_title'  => $val['productInfo']['p_title'],
                    'pp_ids'   => $val['pp_ids'],
                    'pp_names' => $val['ppname'],
                    'ol_num'   => $val['sc_number']
                );

                $this->loadModel('OrderList', array(), 'Mall')->saveData($dataList);
                // 扣库存
                if ($val['pp_ids']) {
                    $ret = $this->loadModel('ProductProfile', array(), 'Mall')->updateStock($val['pp_ids'], $val['sc_number']);
                } else {
                    $ret = $this->loadModel('Product', array(), 'Mall')->updateStock($val['p_id'], $val['sc_number']);
                }

                if(!$ret){
                    Helper_Json::formJson('扣库存失败');
                }
            }

            //写入订单进度
            $orderModel->updateOrderProgress($o_id, '创建订单');
            // 收货地址
            $expressData = array(
                'o_id'        => $o_id,
                'oe_contacts' => $addr['a_realname'],
                'oe_phone'    => $addr['a_phone'],
                'oe_address'  => $addr['a_province'] . $addr['a_city'] . $addr['a_area'] . $addr['a_address'],
                'oe_addtime'  => date('Y-m-d H:i:s')
            );

            $this->loadModel('Express', array(), 'Mall')->saveData($expressData);

            Helper_Json::formJson(array('params' => $params, 'orderNo' => $orderNo, 'id' => $o_id), 'y');
        }else{
            Helper_Json::formJson('订单创建失败');
        }
    }


    //修改收藏状态
    public function collectAction() {
        // 基本数据过滤
        $pid = isset($_POST['pid']) ? intval($_POST['pid']) : '';
        $ret = $this->loadModel('ProductCollect',array(),'Mall')->changeStatus($pid);
        if($ret['code'] == 1) {
            $this->loadModel('Product',array(),'Mall')->addCollect($pid);
            Helper_Json::formJson($ret['data'], 'y');
        } else {
            Helper_Json::formJson($ret['data'], 'n');
        }
    }
}