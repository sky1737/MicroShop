<?php

/**
 * 订单详情
 *
 * @author: lindexin
 * @since : 2016/05/04
 */

class OrderController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_status;

    private $_payStatus = array(
        1 => '未支付',
        2 => '取消订单',
        3 => '已支付',
    );

    private $_orderStatus = array(
        1 => '未发货',
        2 => '已发货',
        3 => '确认订单',
    );

    private $_returnStatus = array(
        1 => '未退款',
        2 => '退款中',
        3 => '已退款',
    );

    public function init()
    {
        $this->initAdmin(false);
        $this->_model    = $this->loadModel('Order', array(), 'Mall');
        $this->_pageSize = 12;
        $this->_status = array(
            1 => '正常',
            2 => '禁用'
        );
    }

    public function indexAction($page=1) {

        $this->initPageTitle('订单列表');

        //搜索数据
        $title            = isset($_GET['name']) ? Helper_Filter::format(trim($_GET['name'])) : '';
        $orderSn          = isset($_GET['orderSn']) ? Helper_Filter::format(trim($_GET['orderSn'])) : '';

        $psid              = isset($_GET['psid']) ? intval($_GET['psid']) : ''; //支付状态
        $osid              = isset($_GET['osid']) ? intval($_GET['osid']) : ''; //订单状态
        $rsid              = isset($_GET['rsid']) ? intval($_GET['rsid']) : ''; //退款状态
        $startTime        = isset($_GET['startTime']) ? $_GET['startTime'] : '';
        $endTime          = isset($_GET['endTime']) ? $_GET['endTime'] : '';

        //手机分页
        $pageMobile        = isset($_GET['page']) ? intval($_GET['page']) : '1';

        $page              = intval($page);

        //类型数据
        $pay_Option       = Helper_Form::option($this->_payStatus,$psid,'请选择支付状态');
        $order_Option      = Helper_Form::option($this->_orderStatus,$osid,'请选择订单状态');
        $return_Option      = Helper_Form::option($this->_returnStatus,$rsid,'请选择退款状态');

        //模型和控制器
        $baseUrl           = '/admin/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where  = array(
            'title'                 => $title,
            'orderSn'               => $orderSn,
            'psid'                  => $psid,
            'osid'                  => $osid,
            'rsid'                  => $rsid,

            'startTime'             => $startTime,
            'endTime'               => $endTime,
        );

        $pagination        = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total             = $this->_model->countData($where);
        $pageUrl           = $baseUrl .  'index/';
        $pageCode          = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data    = $this->_model->getList( $where, $pagination );
        $data    = $this->loadModel('Orderlist',array(),'Mall')->mergData($data,'o_id');
        $data    = $this->loadModel('Product',array(),'Mall')->mergData($data,'p_id');

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'            => $baseUrl,
            'data'               => $data,
            'total'              => $total,
            'page'               => $pageCode,

            'title'             => $title,
            'orderSn'           => $orderSn,

            'startTime'         => $startTime,
            'endTime'           => $endTime,
            'psid'              => $psid,
            'osid'              => $osid,
            'pageMobile'        => $pageMobile,

            'payOption'         => $pay_Option,
            'orderOption'       => $order_Option,
            'returnOption'       => $return_Option,
            'pageSize'          => $this->_pageSize,
        ));
    }

    //改价表单
    public function priceFormAction($id=0) {
        $id = intval($id);

        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }
        $data  = $this->_model->getInfo($id);
        $this->getView()->assign(array(
            'id'   => $id,
            'data' => $data,
        ));
    }

    //关闭订单表单
    public function closeFormAction($id=0) {
        $id = intval($id);

        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }
        $data  = $this->_model->getInfo($id);
        $this->getView()->assign(array(
            'id'   => $id,
            'data' => $data,
        ));
    }

    //填写快递表单
    public function expressFormAction($id=0) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }

        // 物流信息
        $express = $this->loadModel('Express', array(), 'Mall')->getInfo($id);
        $this->getView()->assign(array(
            'id'      => $id,
            'express' => $express,
        ));
    }

    //发货
    public function sendAction($id=0) {

        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }
        $row    = $this->_model->getInfo($id);
        $openId = MemberModel::getInstance()->getOpenId(intval($row['m_id']));

        $data = array(
            'o_order_status' => 2,
            'o_updatetime' => date('Y-m-d H:i:s',time()),
        );
        $ret = $this->_model->saveData($data, $id);
        if($ret){

            //订单进度
            $result = array(
                'o_id'   => $id,
                'op_memo' => '发货成功',
                'op_addtime' => date('Y-m-d H:i:s',time()),
            );
            $this->loadModel('Orderprogress', array(), 'Mall')->saveData($result);

            //发送通知短信
            $data = array(
                'title'    => $row['p_title'],
                'orderNo'  => $row['o_order_no'],
            );
            QueueModel::getInstance()->addQueue($openId, 'deliver_goods_notice', $data);
            //$message = MessageModel::getInstance()->rebuildMessage('deliver_goods_notice', $data);
            //MessageModel::getInstance()->sendTextMessage($openId, $message);

            Helper_Json::formJson('发货成功', 'y');
        }else{
            Helper_Json::formJson('发货失败');
        }
    }

    //确认收货
    public function statusAction($id=0) {

        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }

        $data = array(
            'o_order_status' => 3,
            'o_updatetime' => date('Y-m-d H:i:s',time()),
        );
        $ret = $this->_model->saveData($data, $id);
        if($ret){
            //订单进度
            $result = array(
                'o_id'   => $id,
                'op_memo' => '确认收货',
                'op_addtime' => date('Y-m-d H:i:s',time()),
            );
            $this->loadModel('Orderprogress', array(), 'Mall')->saveData($result);
            Helper_Json::formJson('确认收货成功', 'y');
        }else{
            Helper_Json::formJson('确认收货失败');
        }
    }

    /**
     * 商品详情
     */
    public function detailsAction($id=0){

        $this->initPageTitle('订单详情');
        $id = intval($id);
        if(empty($id)){
            Helper_Json::formJson('缺失参数');
        }

        $data    = $this->_model->getInfo($id);
        $data    = $this->loadModel('Orderlist',array(),'Mall')->mergData(array($data),'o_id');
        $data    = $this->loadModel('Product',array(),'Mall')->mergData($data,'p_id');
        $data    = $this->loadModel('Orderexpress',array(),'Mall')->mergData($data,'o_id');
        $data=$data[0];

        //订单商品
        $orderProduct = $this->loadModel('Orderlist',array(),'Mall')->getAllList($id);
        $orderProduct = $this->loadModel('Product',array(),'Mall')->mergData($orderProduct,'p_id');
        //商品数量
        $productNum   = '';
        if($orderProduct){
            foreach($orderProduct as $v){
                $productNum += $v['ol_num'];
            }
        }

        //购买人数据
        $progressData  = $this->loadModel('Orderprogress', array(), 'Mall')->getAllInfo(intval($data['o_id']));

        // 物流信息
        $express = $this->loadModel('Express', array(), 'Mall')->getInfo(intval($data['o_id']));

        //模版赋值
        $this->getView()->assign(array(
            'data'           => $data,
            'progressData'   => $progressData,
            'express'        => $express,
            'orderProduct'   => $orderProduct,
            'productNum'   => $productNum
        ));
    }
}