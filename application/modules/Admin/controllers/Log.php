<?php

/**
 * 登陆日志
 *
 * @author: moxiaobai(mlkom@live.com)
 * @since : 2015-08-01 
 */

class LogController extends BaseController {

    private $_pageSize = 15;
    private $_model;

    //初始化方法，会默认执行
    public function init() {
        //初始化模版
        $this->initAdmin(false);
        $this->_model = $this->loadModel('SystemLog',array(),'Admin');
    }

    public function indexAction($page=1) {
        //搜索数据
        $name   = isset($_GET['name']) ? $_GET['name'] : '';
        $page   = intval($page);

        //模型和控制器
        $baseUrl    = '/' . $this->getRequest()->getModuleName() . '/' . $this->getRequest()->getControllerName() . '/';

        //分页参数，读取参数设置
        $where      = array('name'=>$name);
        $pagination = array('page'=>$page, 'pagesize'=>$this->_pageSize);

        //做分页
        $total    = $this->_model->countData($where);
        $pageUrl  = $baseUrl .  'index/';
        $pageCode = $this->setPage($page, $this->_pageSize, $total, strtolower($pageUrl));

        //数据列表
        $data = $this->_model->getList( $where, $pagination );
        if($data){
            foreach($data as &$v){
                $v['ll_login_ip'] = Helper_Location::getIpByString($v['ll_login_ip']);
            }
        }

        $this->getView()->assign(array(
            "name"   => $name,
            "baseUrl"   => $baseUrl,
            'page'   => $pageCode,
            'data'   => $data,
            'total'  => $total,
        ));
    }
}