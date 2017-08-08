<?php

/**
 * 购物车管理
 *
 * @author: monyyip
 * @since : 2016/10/10
 */

class ShopcartController extends BaseController
{

    private $_model;

    //初始化
    public function init()
    {
        $this->isAjaxRequest();
        Yaf_Dispatcher::getInstance()->disableView();
    }

    public function addcartAction(){
        $pid = isset($_POST['pid']) ? intval($_POST['pid']) : 0;
        $ppids = isset($_POST['ppids']) ? Helper_Filter::format($_POST['ppids'], FALSE, TRUE) : '';
        $num = isset($_POST['num']) ? intval($_POST['num']) : 1;
        // 判断商品是否存在
        $productInfo = $this->loadModel('Product', array(), 'Mall')->getProductById($pid);
        if(empty($productInfo)){
            Helper_Json::formJson('商品信息错误');
        }

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
            }
        }

        if($num <= 0){
            Helper_Json::formJson('请选择购买数量');
        }

        // 查询该用户是否有加入这个购物车
        $shopCart = $this->loadModel('ShopCart', array(), 'Mall')->getInfoByCond(array('mid' => M_ID, 'pid' => $pid, 'pp_ids' => $ppids));
        if(empty($shopCart)){
            // 未加入购物车，则插入购物车
            $data = array(
                'm_id'       => M_ID,
                'p_id'       => $pid,
                'pp_ids'     => $ppids,
                'sc_number'  => $num,
                'sc_addtime' => date('Y-m-d H:i:s'),
            );

            $scid = $this->loadModel('ShopCart', array(), 'Mall')->saveData($data);
        }else{
            $data = array(
                'sc_number'  => $num + $shopCart['sc_number'],
            );

            $scid = $this->loadModel('ShopCart', array(), 'Mall')->saveData($data, $shopCart['sc_id']);
        }

        if($scid){
            // 添加购物车成功，计算购物车信息
            $count = $this->loadModel('ShopCart', array(), 'Mall')->countData(array('mid' => M_ID));
            $data = array(
                'info'  => '加入购物车成功',
                'count' => $count,
            );

            Helper_Json::formJson($data, 'y');
        }else{
            Helper_Json::formJson('加入购物车失败');
        }
    }

    public function updateAction(){
        $scid = isset($_POST['scid']) ? intval($_POST['scid']) : 0;
        $num = isset($_POST['num']) ? intval($_POST['num']) : 0;
        if(!in_array($num, array(1, -1))){
            Helper_Json::formJson('参数异常');
        }

        $info = $this->loadModel('ShopCart', array(), 'Mall')->getInfo($scid);
        if(empty($info) || $info['m_id'] != M_ID){
            Helper_Json::formJson('购物车错误');
        }

        $info['sc_number'] = $info['sc_number'] + $num;
        $ret = $this->loadModel('ShopCart', array(), 'Mall')->saveData($info, $scid);
        if($ret){
            Helper_Json::formJson('操作成功', 'y');
        }else{
            Helper_Json::formJson('操作失败');
        }
    }

    public function deleteAction(){
        $ids = isset($_POST['ids']) ? Helper_Filter::format($_POST['ids']) : '';
        if(empty($ids)){
            Helper_Json::formJson('未选择删除商品');
        }

        // 判断是否属于这个人
        $cartCount = $this->loadModel('ShopCart', array(), 'Mall')->countCartData($ids, M_ID);
        $idArr = explode(',', $ids);
        if(count($idArr) != $cartCount){
            Helper_Json::formJson('参数异常');
        }

        $ret = $this->loadModel('ShopCart', array(), 'Mall')->deleteCartData($ids, M_ID);
        if($ret){
            Helper_Json::formJson('操作成功', 'y');
        }else{
            Helper_Json::formJson('操作失败');
        }
    }
}