<?php

/**
 * 我的收藏
 *
 * @author: monyyip
 * @since : 2016/10/14 16:43
 */

class CollectController extends BaseController {
    public function init() {
        $this->initViewPath();
        $this->initShopCart();
    }

    public function indexAction() {
        $collect = $this->loadModel('ProductCollect', array(), 'Mall')->getList(array('mid' => M_ID));
        $collect = $this->loadModel('Product', array(), 'Mall')->mergData($collect);
        $this->getView()->assign('data', $collect);
    }

}