<?php

/**
 * 购物车
 *
 * @author: monyyip
 * @since : 2016/10/09 16:43
 */

class ShopcartController extends BaseController {
    public function init() {
        $this->initViewPath();
    }

    public function indexAction() {
        $data = $this->loadModel('ShopCart', array(), 'Mall')->getList(array('mid' => M_ID));
        $totalPrice = 0;
        if($data){
            $data = $this->loadModel('Product', array(), 'Mall')->mergData($data);
            foreach($data as &$val){
                $ppInfo = array();
                if($val['pp_ids']){
                    // 获得套餐信息，使用套餐价格
                    $ppInfo = $this->loadModel('ProductProfile', array(), 'Mall')->getInfo();
                }

                $val['ppInfo'] = $ppInfo;
                $totalPrice += $ppInfo ? $ppInfo['pp_price'] * $val['sc_number'] : $val['p_price'] * $val['sc_number'];
            }
        }

        $this->getView()->assign(
            array(
                'shopCart'   => $data,
                'cartCount'  => $data ? count($data) : 0,
                'totalPrice' => $totalPrice,
            )
        );

    }

}