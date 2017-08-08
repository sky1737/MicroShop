<?php

/**
 * 商城首页
 *
 * @author: monyyip
 * @since : 2016/9/30 16:43
 */

class IndexController extends BaseController {
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
            )
        );
    }


}