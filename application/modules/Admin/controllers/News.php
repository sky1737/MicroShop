<?php

/**
 * 新闻列表
 *
 * @author: lindexin
 * @since : 2016/07/06
 */

class NewsController extends BaseController {

    private $_pageSize;
    private $_model;
    private $_status = array(
        1 => '正常',
        2 => '禁用'
    );

    public function init() {
        //初始化模版
        $this->initAdmin(false);
        $this->_model = $this->loadModel('News',array(),'Admin');
        $this->_pageSize = 12;
    }

    private $_menuList = array(
        'product' => '产品详情',

    );

    public function indexAction($page=1) {
        $this->initPageTitle('新闻列表');

        $pid    = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
        $status = isset($_GET['status']) ? intval($_GET['status']) : 0;
        $title  = isset($_GET['title']) ? Helper_Filter::format($_GET['title']) : '';
        $page   = intval($page);

        //模型和控制器
        $baseUrl    = '/' . $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('title'=>$title, 'pid' => $pid,'status' => $status);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        $category = $this->loadModel('NewsCategory',array(),'Admin')->getListByPid();
        $categoryOption = Helper_Form::option($category ? $category : array(), intval($pid), '请选择分类');

        //数据列表
        $data = $this->_model->getList( $where, $pagination );


        //模版赋值
        $this->getView()->assign(array(
            'baseUrl'        => $baseUrl,
            'title'          => $title,
            'data'           => $data,
            'total'          => $total,
            'page'           => $pageCode,
            'categoryOption' => $categoryOption,
            'cateList'       => $this->loadModel('NewsCategory',array(),'Admin')->getListArr(),
            'statusOption'   => Helper_Form::option($this->_status, intval($status), '请选择状态')
        ));
    }

    //表单页
    public function formAction($id=0) {

        $this->initPageTitle('新闻详情');
        $id = intval($id);
        $row = array();
        if($id > 0) {
            $row  = $this->_model->getInfo($id);
        }else{
            $row = array(
                'n_id' => '',
                'nc_id' => '',
                'n_title' => '',
                'n_cover' => '',
                'n_content' => '',
                'n_des' => '',
                'n_sort' => 1,
                'n_status' => '',
                'n_addtime' => '',
                'nc_type' => '',
            );
        }
        $category = $this->loadModel('NewsCategory',array(),'Admin')->getListByPid();
        $categoryOption = Helper_Form::option($category ? $category : array(), intval($row['nc_id']), '请选择分类');

        $this->getView()->assign(array(
            'row'=> $row,
            'menuList'=> $this->_menuList,
            'categoryOption'=> $categoryOption,

            'statusOption'=> Helper_Form::option($this->_status, intval($row['n_status']), '请选择状态')
        ));
    }


    //上传图片
    public function uploadAction() {
        $api = new Qiniu_Api('img');
        $params = array('category'=>'news', 'file'=>$_FILES['upload']);
        $ret = $api->uploadImg($params);
        if($ret['code'] == 1) {
            Helper_Json::formJson($ret['data'], 'y');
        } else {
            Helper_Json::formJson($ret['msg'], 'n');
        }
    }

    public function saveAction(){
        $post = $this->getRequest()->getPost();
        $id = intval($post['id']);

        unset($post['file']);
        unset($post['id']);

        if($id){
            $msg = '修改';
            $ret = $this->_model->saveData($post, $id);
        }else{
            $msg = '添加';
            $post['n_addtime'] = date('Y-m-d H:i:s');
            $ret = $this->_model->saveData($post);
        }
        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }

    public function statusAction($id = 0, $status = 1){
        if(empty($id)){
            Helper_Json::formJson('参数错误');
        }

        $data['n_status'] = $status == 1 ? 2  : 1;
        $ret = $this->_model->saveData($data, $id);
        $msg = '修改';
        if($ret){
            Helper_Json::formJson($msg . '成功', 'y');
        }else{
            Helper_Json::formJson($msg . '失败');
        }
    }

    public function deleteAction($id = 0){
        if(empty($id)){
            Helper_Json::formJson('参数错误');
        }

        $ret = $this->_model->delete($id);
        if($ret){
            Helper_Json::formJson('删除成功', 'y');
        }else{
            Helper_Json::formJson('删除失败');
        }
    }

}