<?php
/**
 * 会员管理
 *
 * @author: moxiaobai
 * @since : 2016/1/28 16:43
 */
class MemberController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_status;

    public function init() {
        //初始化模版
        $this->initAdmin(false);

        $this->_model     = $this->loadModel('member',array(),'Member');
        $this->_pageSize  = 12;
        $this->_status    = array(1 => '正常', 2 => '禁用');
    }

    //首页
    public function indexAction($page=1) {
        $phone        = isset($_GET['phone']) ? trim($_GET['phone']) : '';
        $status       = isset($_GET['status']) ? intval($_GET['status']) : '';
        $page         = intval($page);

        //模型和控制器
        $baseUrl    = '/' . $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('phone'=>$phone,'status'=>$status);
        $pagination = array('page'=>$page, 'pagesize' => $this->_pageSize);

        //做分页
        $total      = $this->_model->countData($where);
        $pageUrl    = $baseUrl .  'index/';
        $pageCode   = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //类型数据
        $statusOption = Helper_Form::option($this->_status,$status,'请选择状态');

        //数据列表
        $data       = $this->_model->getList( $where, $pagination );
        if($data){
            foreach($data as $v){
                $v['m_regIp'] = Helper_Location::getIpByString($v['m_regIp']);
            }
        }

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'           => $baseUrl,
            'data'              => $data,
            'total'             => $total,
            'statusOption'      => $statusOption,
            'phone'             => $phone,
            'page'              => $pageCode
        ));
    }

    //更改状态
    public function statusAction($id, $status) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }

        $status = ($status == 1) ? 2: 1;
        $data = array('m_status'=> $status);
        $result   = $this->_model->changeData($id,$data);

        if($result) {
            Helper_Json::formJson('操作成功', 'y');
        } else {
            Helper_Json::formJson('操作失败');
        }
    }
}
