<?php


/**
 * 商品折扣管理
 *
 * @author: monyyip
 * @since : 20160927
 */

class DiscountController extends BaseController {

    private $_pageSize;
    private $_model;
    private $status;
    public function init()
    {
        $this->initAdmin(false);
        $this->_model = $this->loadModel('Discount', array(), 'Mall');
        $this->_pageSize = 12;
        $this->status = array(
            1 => '正常',
            2 => '禁用'
        );
    }


    //首页
    public function indexAction($page=1) {
        $title     = isset($_GET['title']) ? Helper_Filter::format(trim($_GET['title'])) : '';
        $page     = intval($page);


        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('title' => $title);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data = $this->_model->getList($where, $pagination);
        $data = $this->loadModel('Product', array(), 'Mall')->mergData($data);

        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'   => $baseUrl,
            'title'     => $title,
            'data'      => $data,
            'total'     => $total,
            'page'      => $pageCode,
        ));
    }

    //表单页
    public function formAction($id=0) {
        $id = intval($id);
        if ( $id > 0 ) {
            $row     = $this->_model->getInfo($id);
        }else{
            $row = array('pd_id' => '','p_id' => '','pd_title' => '','pd_startTime' => '', 'pd_endTime' => '','pd_number' => '');
        }

        $this->getView()->assign('row', $row);
    }


    //新增保存数据
    public function saveAction() {
        $id  = intval( $_POST['id'] );

        // 基本数据过滤
        $data  = $this->getRequest()->getPost();
        // 判断商品是否存在
        if(!$this->loadModel('Product', array(), 'Mall')->getProductById($data['p_id'])){
            Helper_Json::formJson('商品不存在');
        }

        unset($data['id']);

        if($id > 0) {
            $this->_model->saveData($data, $id);
            Helper_Json::formJson('修改成功', 'y');
        } else {
            $data['pd_addtime'] = date('Y-m-d H:i:s');
            $this->_model->saveData($data);
            Helper_Json::formJson('添加成功', 'y');
        }
    }


    //更改状态
    public function deleteAction($id) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }

        $result   = $this->_model->deleteeData($id);
        if($result) {
            Helper_Json::formJson('操作成功', 'y');
        } else {
            Helper_Json::formJson('操作失败');
        }
    }


}