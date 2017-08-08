<?php
/**
 * Created by monyyip.
 * User: monyyip
 * Date: 2016/10/11
 * Time: 16:46
 */



class PayController extends BaseController {
    public function init() {}

    public function orderAction() {
        $source = isset($_GET['source']) ? intval($_GET['source']) : 1;
        //Sdk相关信息,分享，上传图片
        $jsSdk = new Open_Weixin_Js();
        $signPackage = $jsSdk->GetSignPackage();
        $this->getView()->assign('signPackage', $signPackage);
        switch($source){
            case 1:// 直接购买
                $pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
                $ppids = isset($_GET['ppids']) ? Helper_Filter::format($_GET['ppids'], FALSE, TRUE) : '';
                $num = isset($_GET['num']) ? intval($_GET['num']) : 1;
                $addr = isset($_GET['addr']) ? intval($_GET['addr']) : 0;
                // 判断商品是否存在
                $productInfo = $this->loadModel('Product', array(), 'Mall')->getProductById($pid);
                if(empty($productInfo)){
                    $this->redirect('/mall/index/index');
                }

                $price = 0;
                $ppname = array();
                if($ppids){
                    $ppidsArr = explode(',', $ppids);
                    foreach($ppidsArr as $val){
                        $res = $this->loadModel('ProductProfile', array(), 'Mall')->getInfo($val);
                        if(empty($res)){
                            $this->redirect('/mall/index/index');
                        }else{
                            $ppname[] = $res['pp_name'];
                            $price += $res['pp_price'];
                        }
                    }
                }else{
                    $price = $productInfo['p_price'];
                }

                if($num <= 0){
                    $this->redirect('/mall/index/index');
                }

                $addrInfo = $this->loadModel('Address', array(), 'Mall')->getInfo($addr);
                if(empty($addrInfo)){
                    // 获得默认地址
                    $addrInfo = $this->loadModel('Address', array(), 'Mall')->getDefaultInfo();
                }

                if(!empty($addrInfo) && $addrInfo['m_id'] != M_ID){
                    $this->redirect('/mall/index/index');
                }

                $this->setViewPath( APP_PATH . '/application/modules/Mall/views/');
                $this->getView()->assign(
                    array(
                        'productInfo' => $productInfo,
                        'addrInfo'    => $addrInfo,
                        'num'         => $num,
                        'ppname'      => implode(',', $ppname),
                        'pid'         => $pid,
                        'ppids'       => $ppids,
                        'price'       => $price,

                    )
                );

                $this->getView()->display('product/order.html');
                break;
            case 2:
                // 购物车
                $addr = isset($_GET['addr']) ? intval($_GET['addr']) : 0;
                $scids = isset($_GET['scids']) ? Helper_Filter::format($_GET['scids'], FALSE, TRUE) : '';
                if(empty($scids)){
                    $this->redirect('/mall/index/index');
                }

                $addrInfo = $this->loadModel('Address', array(), 'Mall')->getInfo($addr);
                if(empty($addrInfo)){
                    // 获得默认地址
                    $addrInfo = $this->loadModel('Address', array(), 'Mall')->getDefaultInfo();
                }

                if(!empty($addrInfo) && $addrInfo['m_id'] != M_ID){
                    $this->redirect('/mall/index/index');
                }

                $cartList = $this->loadModel('ShopCart', array(), 'Mall')->getCartData($scids, M_ID);
                if(empty($cartList)){
                    $this->redirect('/mall/index/index');
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
                        foreach($ppidsArr as $v){
                            $res = $this->loadModel('ProductProfile', array(), 'Mall')->getInfo($v);
                            if(empty($res)){
                                $this->redirect('/mall/index/index');
                            }else{
                                $ppname[] = $res['pp_name'];
                                $price += $res['pp_price'];
                            }
                        }
                    }else{
                        $price = $productInfo['p_price'];
                    }

                    $val['price'] = $price;
                    $val['ppname'] = implode(',', $ppname);
                    $totalPrice += $price;
                }

                $this->setViewPath( APP_PATH . '/application/modules/Mall/views/');
                $this->getView()->assign(
                    array(
                        'cartList'   => $cartList,
                        'addrInfo'   => $addrInfo,
                        'totalPrice' => $totalPrice,
                        'scids'      => $scids
                    )
                );

                $this->getView()->display('shopcart/order.html');
                break;
            case 3:
                // 重新支付
                $oid = isset($_GET['oid']) ? intval($_GET['oid']) : 0;
                // 获得订单信息
                $orderInfo = $this->loadModel('Order', array(), 'Mall')->getInfo($oid);


                // 获得商品信息
                $orderList = $this->loadModel('OrderList', array(), 'Mall')->getAllList($oid);
                $orderList = $this->loadModel('Product', array(), 'Mall')->mergData($orderList);
                foreach($orderList as &$val){
                    $productInfo = $this->loadModel('Product', array(), 'Mall')->getProductById($val['p_id']);
                    if(empty($productInfo)){
                        $this->redirect('/mall/index/index');
                    }

                    $ppname = array();
                    $price = 0;
                    if(!empty($val['pp_ids'])){
                        $ppidsArr = explode(',', $val['pp_ids']);
                        foreach($ppidsArr as $v){
                            $res = $this->loadModel('ProductProfile', array(), 'Mall')->getInfo($v);
                            if(empty($res)){
                                $this->redirect('/mall/index/index');
                            }else{
                                $ppname[] = $res['pp_name'];
                                $price += $res['pp_price'];
                            }
                        }
                    }else{
                        $price = $productInfo['p_price'];
                    }

                    $val['price'] = $price;
                    $val['ppname'] = implode(',', $ppname);
                }

                // 获得路由信息
                $express = $this->loadModel('Express', array(), 'Mall')->getInfo($oid);
                $this->setViewPath( APP_PATH . '/application/modules/Mall/views/');
                $this->getView()->assign(
                    array(
                        'express'   => $express,
                        'orderInfo' => $orderInfo,
                        'orderList' => $orderList,
                    )
                );

                $this->getView()->display('shopcart/repay.html');

                break;
        }

        die;
    }

}