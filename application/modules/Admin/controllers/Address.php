<?php
/**
 * 地址管理
 *
 * @author: moxiaobai
 * @since : 2016/1/28 16:43
 */
class AddressController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_status;

    public function init() {
        //初始化模版
        $this->initAdmin(false);
        $this->_model = $this->loadModel('address',array(),'Member');
        $this->_pageSize = 12;
        $this->_status = array(1 => '不是默认', 2 => '默认');
    }

    //首页
    public function indexAction($id,$page=1) {
        $phone     = isset($_GET['phone'])  ? trim($_GET['phone']) : '';
        $status    = isset($_GET['status']) ? intval($_GET['status']) : '';
        $name      = isset($_GET['name'])   ? trim($_GET['name']) : '';
        $id        = intval($id);
        if(!$id){
            $this->redirect('/admin/member/index');exit;
        }

        $page      = intval($page);

        //模型和控制器
        $baseUrl    = '/' . $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName() . '/';


        //分页参数，读取参数设置
        $where      = array('status'=>$status,'id'=>$id,'phone'=>$phone,'name'=>$name);
        $pagination = array('page'=>$page, 'pagesize' => $this->_pageSize);

        //做分页
        $total      = $this->_model->countData($where);
        $pageUrl    = $baseUrl .  'index/';
        $pageCode   = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //类型数据
        $statusOption = Helper_Form::option($this->_status,$status,'请选择地址状态');

        //数据列表
        $data       = $this->_model->getList( $where, $pagination );

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'           => $baseUrl,
            'data'              => $data,
            'id'              => $id,
            'total'             => $total,
            'phone'             => $phone,
            'name'             => $name,
            'statusOption'      => $statusOption,
            'page'              => $pageCode
        ));
    }

}
