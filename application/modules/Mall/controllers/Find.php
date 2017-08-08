<?php

/**
 * 发现
 *
 * @author: monyyip
 * @since : 2016/10/14 16:43
 */

class FindController extends BaseController {
    public function init() {
        $this->initViewPath();
        $this->initShopCart();
        $this->_pageSize = 20;
    }

    public function indexAction($page = 1) {
//        $cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
//        $type = isset($_GET['type']) ? Helper_Filter::format($_GET['type'], FALSE, TRUE) : '';
        $categorys = $this->loadModel('NewsCategory', array(), 'Admin')->getList(array('status' => 1));
        //订单列表数据
//        $pagination = array('page'=> $page, 'pagesize'=> $this->_pageSize);
        $data = $this->loadModel('News', array(), 'Admin')->getList(array('status' => 1));
        //下拉加载数据
//        if($type == 'load') {
//            if(!$data){return FALSE;}
//
//            $this->getView()->assign('data', $data);
//            $this->getView()->display('find/load.html');
//            exit;
//        }

        $this->getView()->assign(array(
//            'cate'      => $cate,
            'categorys' => $categorys,
            'data'      => $data,
            'nav'      => 2,
//            'pageSize'  => $this->_pageSize,
//            'total'     => $data ? count($data) : 0,
        ));
    }

    public function detailsAction($id = 0){
        $newsInfo = $this->loadModel('News', array(), 'Admin')->getInfo($id);
        $this->getView()->assign('data', $newsInfo);
    }

}