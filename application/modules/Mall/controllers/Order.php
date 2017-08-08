<?php

/**
 * 订单管理
 *
 * @author: lindexin
 * @since : 2016/10/13 9:43
 */

class OrderController extends BaseController {

    private $_model;
    //单页数量
    private $_pageSize = 5;

    public function init() {
        $this->initViewPath();
        $this->initShopCart();
        $this->_model = $this->loadModel('Order');
    }

    //我的订单
    public function indexAction() {

        //用户信息
        $data     = $this->loadModel('Member',array(),'Member')->getInfoByOpenId(OPEN_ID);

        //待付款 未发货
        $waitNumber = $this->_model->countData(array('psid'=>1,'osid'=>1));
        //待发货 已付款
        $payNumber = $this->_model->countData(array('psid'=>3,'osid'=>1));
        //已发货 已付款
        $sendNumber = $this->_model->countData(array('psid'=>3,'osid'=>2));
        //已完成 已付款
        $overNumber = $this->_model->countData(array('psid'=>3,'osid'=>3));
        //退款中
        $returnNumber = $this->_model->countData(array('psid'=>3,'rsid'=>2));

        $this->getView()->assign(array(
            'data'          => $data,
            'waitNumber'    => $waitNumber,
            'payNumber'     => $payNumber,
            'sendNumber'    => $sendNumber,
            'overNumber'    => $overNumber,
            'returnNumber'  => $returnNumber,
            'nav'  => 4,
        ));
    }

    /**
     * 订单列表
     *
     * @param int $page
     * @param title 搜索标题
     * @param type 加载类型
     * @return bool
     */
    public function listAction($page = 1) {

        $showType     = isset($_GET['showType']) ? intval($_GET['showType']) : '';//订单类型
        $type         = isset($_GET['type']) ? $_GET['type'] : '';//加载类型
        $page     = intval($page);

        //所有选项数据
        $where = array('mid'=>M_ID,'showType'=>$showType);
        //订单列表数据
        $pagination = array('page'=> $page, 'pagesize'=> $this->_pageSize);

        $field      = 'm_id,o_pay_status,o_order_status,o_refund_status,o_payment_amount';

        $count      = $this->_model->countData($where);
        $allData    = $this->_model->getList($where, $pagination,$field);

        $allData    = $this->loadModel('Orderlist')->mergData($allData,'o_id');
        $allData    = $this->loadModel('Product')->mergData($allData,'p_id');
        $allData    = $this->loadModel('ProductProfile')->mergData($allData,'p_id');

        //下拉加载数据
        if($type == 'load') {
            if(!$allData){return FALSE;}
            $this->getView()->assign('allData', $allData);
            $this->getView()->display('order/load.html');
            exit;
        }

        $this->getView()->assign(array(
            'allData'     => $allData,
            'showType'    => $showType,
            'total'       => $count,
            'pageSize'    => $this->_pageSize,
            'nav'    => 4
        ));
    }

    //订单详情
    public function detailsAction($id) {

        if(empty($id)){
            $this->redirect('/mall/order/list');
            return FALSE;
        }
        $data    = $this->_model->getInfo($id);
        $data    = $this->loadModel('Orderlist')->mergData(array($data),'o_id');
        $data    = $this->loadModel('Product')->mergData($data,'p_id');
        $data    = $this->loadModel('Orderexpress')->mergData($data,'o_id');
        $data=$data[0];

        //订单商品id
        $orderProduct = $this->loadModel('Orderlist')->getAllList($id);
        $orderProduct = $this->loadModel('Product')->mergData($orderProduct,'p_id');

        $this->getView()->assign(array(
            'data' =>$data,
            'orderProduct' =>$orderProduct,
            'id' =>$id,
        ));
    }

}