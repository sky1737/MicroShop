<?php

/**
 * 商品列表
 *
 * @author: monyyip
 * @since : 2016/10/09 16:43
 */

class ProductController extends BaseController {
    public function init() {
        $this->initViewPath();
        $this->initShopCart();
    }

    public function indexAction() {
        $title = isset($_GET['title']) ? Helper_Filter::format($_GET['title']) : '';
        // 获得商品分类
        $categorys = $this->loadModel('Category')->getList(array('status' => 1));
        // 广告轮播
        $banner = $this->loadModel('Ads', array(), 'Admin')->getAdgroup('home_focus');
        // 获得排序前十的商品
        $products = $this->loadModel('Product', array(), 'Mall')->getAllProduct(array('title' => $title, 'status' => 1), array('limit' => 6));
        // 实例代购物车
        $this->getView()->assign(
            array(
                'categorys' => $categorys,
                'banner'    => $banner,
                'products'  => $products,
                'title'     => $title
            )
        );
    }

    public function detailsAction($pid = 0){
        // 获得商品信息
        $data = $this->loadModel('Product', array(), 'Mall')->getProductById($pid);
        // 判断商品是否是特价商品
        $res = $this->loadModel('Discount')->getInfoByCond(array('pid' => $pid, 'time' => date('Y-m-d H:i:s')));
        // 获得套餐类型
        $ptList = $this->loadModel('ProfileType')->getList(array('status' => 1));
        $ptData = array();
        if($ptList){
            foreach($ptList as $val){
                $ptData[$val['pt_id']] = $val['pt_name'];
            }
        }

        // 获得收藏信息
        $collectInfo = $this->loadModel('ProductCollect', array(), 'Mall')->getInfo($pid);

        // 获得套餐列表
        $ppList = $this->loadModel('ProductProfile')->getList(array('p_id' => $pid));

        $ppData = array();
        if($ppList){
            foreach($ppList as $val){
                if(empty($ptData) || !array_key_exists($val['pt_id'], $ptData)){
                    continue;
                }

                $ppData[$val['pt_id']]['list'][] = $val;
                $ppData[$val['pt_id']]['name'] = $ptData[$val['pt_id']];
            }
        }

        $this->getView()->assign(
            array(
                'data'     => $data,
                'discount' => $res,
                'ppData'   => $ppData,
                'ppCount'  => $ppData ? count($ppData) : 0,
                'collect'  => $collectInfo
            )
        );
    }
}