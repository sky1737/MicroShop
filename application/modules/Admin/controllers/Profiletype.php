<?php


/**
 * 套餐分类
 *
 * @author: monyyip
 * @since : 20160407
 */

class ProfiletypeController extends BaseController {

    private $_pageSize;
    private $_model;
    private $status;
    public function init()
    {
        $this->initAdmin(false);
        $this->_model = $this->loadModel('ProfileType', array(), 'Mall');
        $this->_pageSize = 12;
        $this->status = array(
            1 => '正常',
            2 => '禁用'
        );
    }


    //首页
    public function indexAction($page=1) {
        $name     = isset($_GET['name']) ? Helper_Filter::format(trim($_GET['name'])) : '';
        $page     = intval($page);


        //模型和控制器
        $baseUrl = '/' . $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('name'=>$name);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data = $this->_model->getList( $where, $pagination );
        // 获得分类树
        $category = $this->_model->getAllCategory();
        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'      => $baseUrl,
            'name'         => $name,
            'data'      => $data,
            'total'     => $total,
            'page'      => $pageCode,
            'category' => $category,
        ));
    }

    //表单页
    public function formAction($id=0) {
        $id = intval($id);
        if ( $id > 0 ) {
            $row     = $this->_model->getInfo($id);
        }else{
            $row = array('pt_id' => '','pt_name' => '','pt_status' => '1','pt_addtime' => '');
        }


        $statusOption = Helper_Form::option($this->status, intval($row['pt_status']), '请选择状态');
        $this->getView()->assign('statusOption', $statusOption);
        $this->getView()->assign('row', $row);
    }


    //新增保存数据
    public function saveAction() {
        $id  = intval( $_POST['id'] );

        // 基本数据过滤
        $data  = $this->getRequest()->getPost();

        unset($data['id']);

        if($id > 0) {
            $this->_model->saveData($data, $id);
            Helper_Json::formJson('修改成功', 'y');
        } else {
            $data['pt_addtime'] = date('Y-m-d H:i:s');
            $this->_model->saveData($data);
            Helper_Json::formJson('添加成功', 'y');
        }
    }


    //更改状态
    public function statusAction($id, $status) {
        $id = intval($id);
        if( empty($id) ) {
            Helper_Json::formJson('缺失参数');
        }

        $status = ($status == 1) ? 2: 1;
        $data = array('pt_status'=>$status);
        $result   = $this->_model->changeData($id,$data);
        if($result) {
            Helper_Json::formJson('操作成功', 'y');
        } else {
            Helper_Json::formJson('操作失败');
        }
    }


}